<?php

namespace App\Listeners;

use Exception;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Storage;
use Throwable;

class DownloadImageListener implements ShouldQueue
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
        try{
            if ( isset( $event, $event->path ) && $event->path !== 'N/A' )
            {
                $contents = file_get_contents( $event->path );
                Storage::put( 'public/posters/'.md5( $event->path ), $contents);
            }
        }catch( Exception | Throwable $e ){
        }
    }
}
