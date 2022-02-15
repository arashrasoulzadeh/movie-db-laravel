<?php

namespace App\Services;

use Illuminate\Http\Resources\Json\JsonResource;

interface MovieServiceInterface {


	public function findMovieByIMDBId( string $id );
	public function findMovieByNameAndYear( string $name, string $year );
}