<?php

namespace App\Services;

use App\Http\Resources\IMDBMovieSearchResultResource;
use App\Http\Resources\IMDBMovieSearchResultResourceCollection;
use App\Repositories\MoviesRepositoryInterface;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class MovieService implements MovieServiceInterface
{



	public function __construct( public MoviesRepositoryInterface $movieRepository )
	{
		
	}

	public function findMovieByIMDBId( string $id )
	{
		return $this->movieRepository->findMovieByIMDBId( $id );
	}	

	public function findMovieByNameAndYear( string $name, string $year )
	{
		return $this->movieRepository->findMovieByNameAndYear( $name, $year );
	}
 

}