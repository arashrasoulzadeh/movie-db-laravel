<?php
namespace App\Repositories;

use App\Entities\MovieSingle;
use App\Events\FetchSearchFromOpenMovieEvent;
use App\Events\FetchSingleMovieFromOpenMovieEvent;
use App\Events\SaveSingleMovieToDatabaseEvent;
use App\Models\Movie;
use App\Repositories\MoviesRepositoryInterface;
use Exception;

class SampleOfflineRepository implements MoviesRepositoryInterface
{
	public function findMovieByIMDBId( string $id )
	{
		$movie = Movie::find( $id );
		if ( isset( $movie ) )
		{
			return MovieSingle::createFromOfflineSingleResult( $movie );
		} 
		event( new FetchSingleMovieFromOpenMovieEvent( $id ) );
		throw new Exception( 'movie not found offline, trying to fetch in a sec!' );
	}
	public function findMovieByNameAndYear( string $name, string $year )
	{
		event( new FetchSearchFromOpenMovieEvent( $name, $year ) );
		return Movie::where( 'title', 'like', '%' . strtolower( $name ) . '%' )->where( 'year', $year )->get() ;
	}

}