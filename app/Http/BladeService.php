<?php

namespace App\Jobs;

use App\User;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Support\ServiceProvider;

class BladeService implements SelfHandling
{
    public $id = -1;

    public function __construct()
    {
    }

    public function handle()
    {
    }
}