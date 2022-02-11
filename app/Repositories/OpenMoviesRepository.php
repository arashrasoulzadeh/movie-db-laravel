<?php

namespace App\Repositories;

use App\Http\Resources\IMDBMovieSearchResultResource;
use App\Http\Resources\IMDBMovieSearchResultResourceCollection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class OpenMoviesRepository implements MoviesRepositoryInterface
{

	private function getApiKey()
	{
		return env( 'OMDB_TOKEN' );
	}

	public function findMovieByIMDBId( string $id )
	{
		return Cache::remember( 'find_from_imdb_by_id_'.$id , 60*60*24 , function ()  use ( $id )
		{
			$call = Http::get( "http://www.omdbapi.com/?i={$id}&apikey={$this->getApiKey()}" );
			return json_decode( $call->body() );
		});
	}
	public function findMovieByNameAndYear( string $name, string $year )
	{
		return Cache::remember( 'find_from_imdb_by_name_'.$name.'_and_year_'.$year , 60*60*24 , function ()  use ( $name, $year )
		{
			$call = Http::get( "http://www.omdbapi.com/?s={$name}&y={$year}&apikey={$this->getApiKey()}" );
			return json_decode( $call->body() );
		});	
	}


	public function searchResultResource() : string
	{
		return IMDBMovieSearchResultResource::class;
	}
	public function searchResultResourceCollection() : string
	{
		return IMDBMovieSearchResultResourceCollection::class;
	}
}