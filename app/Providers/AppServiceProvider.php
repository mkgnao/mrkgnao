<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\BladeService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('App\Http\BladeService', function ($app) {
            return new BladeService($app);
        });
    }
}
