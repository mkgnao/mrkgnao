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
        Config::set('id', -1);
        Config::set('tw_id', -1);
        Config::set('id_pad', null);
        Config::set('tw_me', null);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }
}
