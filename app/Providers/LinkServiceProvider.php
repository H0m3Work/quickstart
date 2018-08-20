<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class LinkServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            \App\Repositories\Link\LinkRepositoryInterface::class,
            \App\Repositories\Link\Eloquent\LinkEloquentRepository::class
        );
    }
}
