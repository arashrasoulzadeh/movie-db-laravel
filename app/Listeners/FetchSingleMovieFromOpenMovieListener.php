<?php

namespace App\Listeners;

use App\Repositories\OpenMoviesRepository;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class FetchSingleMovieFromOpenMovieListener implements ShouldQueue
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
        $repo->findMovieByIMDBId( $event->imdbid );
    }
}
