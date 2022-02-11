<?php

namespace App\Http\Controllers;

use App\Services\MovieServiceInterface;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function __construct( public MovieServiceInterface $movieService )
    {
        
    }
    public function searchByNameAndYear( Request $request, $query, $year )
    {
        $resource_class = $this->movieService->searchResultResource();
        $resource_collection_class = $this->movieService->searchResultResourceCollection();
        $result = collect($this->movieService->findMovieByNameAndYear( $query, $year )->Search);
        return (new $resource_collection_class( new $resource_class( $result ) ) );
    }
}
