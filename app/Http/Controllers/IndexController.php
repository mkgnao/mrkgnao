<?php

namespace App\Http\Controllers;

use App\Http\Requests;


class IndexController extends Controller
{
    public function __construct()
    {
    }

    public function show()
    {
        return \View::make('index');
    }
}