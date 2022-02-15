<?php

namespace App\Listeners;

use App\Events\FetchSingleMovieFromOpenMovieEvent;
use App\Models\Movie;
use App\Repositories\OpenMoviesRepository;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class FetchSearchFromOpenMovieListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $repo = new OpenMoviesRepository();
        $results = $repo->findMovieByNameAndYear( $event->name, $event->year );
        foreach( $results as $movie )
        {
            if ( Movie::find( $movie->getId() ) === null  ) 
            {
                event( new FetchSingleMovieFromOpenMovieEvent( $movie->getId() ) );
            }
        }
    }
}
