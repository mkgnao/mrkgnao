<?php

namespace App\Jobs;

use App\User;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Support\ServiceProvider;

class BladeService implements SelfHandling
{
    public $c;
    public $app;

    //public $id;
    //public $id_pad;
    //public $tw_me;

    public function __construct($app, $c)
    {
        $this->app = $app;
        $this->c = new Config();
    }

    public function handle()
    {
    }
}