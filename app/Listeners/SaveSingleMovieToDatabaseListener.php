<?php

namespace App\Listeners;

use App\Models\Movie;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SaveSingleMovieToDatabaseListener
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
        if ( !Movie::whereimdbid( $event->movie->getImdbid() )->exists() )
        {
         Movie::create( 
            [
                "title"          =>   $event->movie->getTitle() ?? null,
                "year"           =>   $event->movie->getYear() ?? null,
                "rated"          =>   $event->movie->getRated() ?? null,
                "released"       =>   $event->movie->getReleased() ?? null,
                "runtime"        =>   $event->movie->getRuntime() ?? null,
                "genre"          =>   $event->movie->getGenre() ?? null,
                "director"       =>   $event->movie->getDirector() ?? null,
                "writer"         =>   $event->movie->getWriter() ?? null,
                "actors"         =>   $event->movie->getActors() ?? null,
                "plot"           =>   $event->movie->getPlot() ?? null,
                "language"       =>   $event->movie->getLanguage() ?? null,
                "country"        =>   $event->movie->getCountry() ?? null,
                "awards"         =>   $event->movie->getAwards() ?? null,
                "poster"         =>   $event->movie->getPoster()->getPath() ?? null,
                "metascore"      =>   $event->movie->getMetascore() ?? null,
                "imdbrating"     =>   $event->movie->getImdbrating() ?? null,
                "imdbvotes"      =>   $event->movie->getImdbvotes() ?? null,
                "imdbid"         =>   $event->movie->getImdbid() ?? null,
                "type"           =>   $event->movie->getType() ?? null,
                "totalseasons"   =>   $event->movie->getTotalseasons() ?? null,
            ]
          );
        }
    }
}
