<?php

namespace App\Providers;

use App\Events\DownloadImageEvent;
use App\Events\FetchSingleMovieFromOpenMovieEvent;
use App\Events\SaveSingleMovieToDatabaseEvent;
use App\Listeners\DownloadImageListener;
use App\Listeners\FetchSingleMovieFromOpenMovieListener;
use App\Listeners\SaveSingleMovieToDatabaseListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        DownloadImageEvent::class => [
            DownloadImageListener::class
        ],
        SaveSingleMovieToDatabaseEvent::class => [
            SaveSingleMovieToDatabaseListener::class
        ],
        FetchSingleMovieFromOpenMovieEvent::class => [
            FetchSingleMovieFromOpenMovieListener::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
