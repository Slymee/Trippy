<?php

namespace App\Providers;

use App\Repositories\Interfaces\UserRegistrationRepositoryInterface;
use App\Repositories\UserRegistrationRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(UserRegistrationRepositoryInterface::class, UserRegistrationRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
