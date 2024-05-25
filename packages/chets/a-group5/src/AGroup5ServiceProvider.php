<?php

namespace Chets\AGroup5;

use Illuminate\Support\ServiceProvider;

class AGroup5ServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // Loading routes
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

        // Loading migrations
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        // Loading views
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'home');

        // Publishing views
        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/home'),
        ], 'views');

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        // Register any bindings or service container entries here
    }
}
