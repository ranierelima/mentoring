<?php

namespace Mentor\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'Mentor\Repositories\DemandRepository',
            'Mentor\Repositories\DemandRepositoryEloquent'
        );

        $this->app->bind(
            'Mentor\Repositories\UserRepository',
            'Mentor\Repositories\UserRepositoryEloquent'
        );

    }
}
