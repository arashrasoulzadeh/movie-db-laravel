<?php

namespace App\Http\Controllers;

use App\Http\Resources\MovieSearchResultResource;
use App\Http\Resources\MovieSearchResultResourceCollection;
use App\Http\Resources\MovieSingleResource;
use App\Services\MovieServiceInterface;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function __construct( public MovieServiceInterface $movieService )
    {
        
    }
    public function searchByNameAndYear( Request $request, $year, $query )
    {
        $result = collect( $this->movieService->findMovieByNameAndYear( $query, $year ) );
        return ( new MovieSearchResultResourceCollection( new MovieSearchResultResource( $result ) ) );
    }

    public function single( Request $request, $id )
    {
        return new MovieSingleResource( $this->movieService->findMovieByIMDBId( $id ) );

    }
}
