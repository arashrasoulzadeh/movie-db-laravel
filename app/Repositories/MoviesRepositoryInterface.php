<?php

namespace App\Repositories;

interface MoviesRepositoryInterface
{
	public function findMovieByIMDBId( string $id );
	public function findMovieByNameAndYear( string $name, string $year );
}