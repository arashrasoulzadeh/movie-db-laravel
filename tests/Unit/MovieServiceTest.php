<?php

namespace Tests\Unit;

use App\Services\MovieService;
use Tests\TestCase;

class MovieServiceTest extends TestCase
{
    /**
     * test finding a movie by imdb id.
     *
     * @return void
     */
    public function test_find_movie_by_id()
    {
        $movieService = app()->make( MovieService::class );
        $star_wars_1  = $movieService->findMovieByIMDBId( 'tt0076759' );
        $this->assertTrue( (bool) $star_wars_1->Response );
        $this->assertTrue( $star_wars_1->Title === 'Star Wars: Episode IV - A New Hope' );
    }

    /**
     * test finding a movie by imdb id.
     *
     * @return void
     */
    public function test_find_movie_by_name_and_year()
    {
        $movieService = app()->make( MovieService::class );
        $star_wars_search  = $movieService->findMovieByNameAndYear( 'Star wars IV', '1977' );
        $this->assertTrue( (bool) $star_wars_search->Response );
        $this->assertCount( 1, $star_wars_search->Search );
    }
}
