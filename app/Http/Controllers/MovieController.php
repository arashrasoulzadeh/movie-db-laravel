<?php

namespace App\Http\Controllers;

use App\Http\Resources\MovieSearchResultResource;
use App\Http\Resources\MovieSearchResultResourceCollection;
use App\Http\Resources\MovieSingleResource;
use App\Services\MovieServiceInterface;
use Illuminate\Http\Request;
use Ramsey\Collection\Collection;

class MovieController extends Controller
{
    public function __construct( public MovieServiceInterface $movieService )
    {
        
    }
    public function searchByNameAndYear( Request $request, $year, $query )
    {
        $result = $this->movieService->findMovieByNameAndYear( $query, $year ) ;
        if ( !$result instanceof Collection )
        {
            $result= collect($result);
        }
        return ( new MovieSearchResultResourceCollection( new MovieSearchResultResource( $result ) ) );
    }

    public function single( Request $request, $id )
    {
        return new MovieSingleResource( $this->movieService->findMovieByIMDBId( $id ) );

    }
}
