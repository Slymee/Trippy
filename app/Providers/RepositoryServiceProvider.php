<?php

namespace App\Providers;

use App\Repositories\Interfaces\UserAuthenticationRepositoryInterface;
use App\Repositories\UserAuthenticationRepository;
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
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
