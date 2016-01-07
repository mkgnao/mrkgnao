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
        $this->app->singleton('bs', function($app)
        {
            return new BladeService();
        });
    }
}
