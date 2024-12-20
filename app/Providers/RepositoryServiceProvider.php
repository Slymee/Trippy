<?php

namespace App\Providers;

use App\Repositories\Interfaces\TripRepositoryInterface;
use App\Repositories\Interfaces\UserAuthenticationRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;

use App\Repositories\TripRepository;
use App\Repositories\UserAuthenticationRepository;
use App\Repositories\UserRepository;
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
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(TripRepositoryInterface::class, TripRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
