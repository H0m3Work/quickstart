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
        // $this->app->bind(LinkController::class, function() {
        //     return new LinkController($this->app['excel']);
        // });
    }
}
