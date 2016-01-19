<?php

namespace App\Http\Controllers;

use App\Http\Requests;

class IndexController extends Controller
{
    public function show()
    {
        \Log::info('index show');

        return \View::make('index');
    }
}