<?php

namespace Tzepifan\ArtisanWebConsole;

use Illuminate\Support\ServiceProvider;

class ArtisanWebConsoleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/artisan-web-console.php' => config_path('artisan-web-console.php')
        ], 'config');

        $this->publishes([
            __DIR__.'/assets' => public_path('vendor/tzepifan/artisan-web-console'),
        ], 'public');

        $this->loadViewsFrom(__DIR__.'/Views', 'console');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        include __DIR__.'/Routes/routes.php';
        $this->app->make('Tzepifan\ArtisanWebConsole\Http\Controllers\BaseController');
    }
}
