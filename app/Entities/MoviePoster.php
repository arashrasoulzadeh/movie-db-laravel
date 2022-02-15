<?php

namespace App\Entities;

use App\Events\DownloadImageEvent;
use Exception;
use Throwable;
use Illuminate\Support\Facades\Storage;

class MoviePoster
{
	private $path;

	public function __construct( $path )
	{
		$this->path = $path;	
	}

	public function getPath()
	{
		if ( Storage::exists( 'public/posters/'.md5( $this->path ) ))
		{
			return url( Storage::url( 'public/posters/'.md5( $this->path ) ) );
			// return route( 'poster-serve', [ md5( $this->path ) ] );
		}else
		{
			event( new DownloadImageEvent( $this->path ) );
			return $this->path;
		}
	}
}