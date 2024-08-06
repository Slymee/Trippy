<?php

namespace App\Providers;

use App\Repositories\AccommodationRepository;
use App\Repositories\DestinationRepository;
use App\Repositories\ItineraryRepository;
use App\Repositories\TransportationRepository;
use App\Repositories\TripRepository;
use App\Repositories\UserAuthenticationRepository;


use App\Repositories\Interfaces\AccommodationRepositoryInterface;
use App\Repositories\Interfaces\DestinationRepositoryInterface;
use App\Repositories\Interfaces\ItineraryRepositoryInterface;
use App\Repositories\Interfaces\TransportationRepositoruInterface;
use App\Repositories\Interfaces\TripRepositoryInterface;
use App\Repositories\Interfaces\UserAuthenticationRepositoryInterface;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //authentication repository
        $this->app->bind(UserAuthenticationRepositoryInterface::class, UserAuthenticationRepository::class);
        $this->app->bind(TripRepositoryInterface::class, TripRepository::class);
        $this->app->bind(DestinationRepositoryInterface::class, DestinationRepository::class);
        $this->app->bind(ItineraryRepositoryInterface::class, ItineraryRepository::class);
        $this->app->bind(AccommodationRepositoryInterface::class, AccommodationRepository::class);
        $this->app->bind(TransportationRepositoruInterface::class, TransportationRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
