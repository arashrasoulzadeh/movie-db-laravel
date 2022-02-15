<?php

namespace App\Repositories;

use App\Entities\MovieSearchResultRow as EntitiesMovieSearchResultRow;
use App\Entities\MovieSingle;
use App\Events\SaveSingleMovieToDatabaseEvent;
use App\Exceptions\NoApiKeyProvided;
use App\Http\Resources\IMDBMovieSearchResultResource;
use App\Http\Resources\IMDBMovieSearchResultResourceCollection;
use App\Models\Movie;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Throwable;

class OpenMoviesRepository implements MoviesRepositoryInterface
{

	protected $cache_ttl = 60 * 60 * 24;
	// protected $cache_ttl = -1;

	private function getApiKey()
	{
		return env('OMDB_TOKEN');
	}

	public function findMovieByIMDBId(string $id)
	{
		$response = Cache::remember( $this->cacheKeyForFindMovieById( $id ), $this->cache_ttl, function ()  use ($id) {
			$call = Http::get("http://www.omdbapi.com/?i={$id}&apikey={$this->getApiKey()}");
			return json_decode($call->body());
		});
		if ( isset( $response, $response->Error ) )
		{
			throw new Exception( $response->Error );
		}
		$movie = MovieSingle::createFromOpenMovieSingleResult( $response );
		if ( !Movie::whereimdbid( $movie->getImdbid() )->exists() )
		{
			event( new SaveSingleMovieToDatabaseEvent( $movie ) ) ;
		}
		return $movie;
	}
	public function findMovieByNameAndYear( string $name, string $year )
	{
		$body = $this->findMovieByNameAndYearRequest( $name, $year );
		if ( isset( $body, $body->Search ) )
		{
			return  EntitiesMovieSearchResultRow::createFromOpenMovieSearchResult( $this->findMovieByNameAndYearRequest( $name, $year )->Search );
		}
		Cache::forget( $this->cacheKeyForFindMovieByNameAndYearRequest( $name, $year ) );
		$this->checkForErrors( $body );
	}

	public function findMovieByNameAndYearRequest( $name, $year )
	{
		return Cache::remember( $this->cacheKeyForFindMovieByNameAndYearRequest( $name, $year ), $this->cache_ttl, function ()  use ($name, $year) {
			try
			{

				$call = Http::get( $this->handlePaginationInRequestUrl( "http://www.omdbapi.com/?s={$name}&y={$year}&apikey={$this->getApiKey()}" ) );
				return json_decode( $call->body() );
			}catch( Exception| Throwable $e )
			{
				Throw new Exception( 'cannot connect to open movie database ' );
			}
		});
	}

	private function handlePaginationInRequestUrl( $url )
	{
		return $url . '&page=' . $this->getPage();
	}

	private function getPage()
	{
		return app()->request->page ?? 1;
	}

	private function cacheKeyForFindMovieByNameAndYearRequest( $name, $year )
	{
		return 'find_from_imdb_by_name_request_' . $name . '_and_year_' . $year . '_p' . $this->getPage() ;
	}

	private function cacheKeyForFindMovieById( $id )
	{
		return 'find_from_imdb_by_id_' . $id;
	}

	private function checkForErrors( $body )
	{
		if ( isset( $body, $body->Response ) ) 
		{
			throw new Exception( $body->Error );
		}
		abort( 500 );
	}
}
