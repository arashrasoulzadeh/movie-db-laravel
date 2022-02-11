<?php

namespace App\Providers;

use App\Repositories\MoviesRepositoryInterface;
use App\Repositories\OpenMoviesRepository;
use App\Services\MovieServiceInterface;
use App\Services\MovieService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        app()->bind( MoviesRepositoryInterface::class, OpenMoviesRepository::class );
        app()->bind( MovieServiceInterface::class, MovieService::class );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
