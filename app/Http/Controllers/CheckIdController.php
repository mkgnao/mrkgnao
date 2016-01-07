<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\TeamWorkPm;
use Auth;
use DB;
use Illuminate\Http\Request;
use App\Util;

class CheckIdController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the user main page.
     *
     * @return Response
     */
    public function index($id)
    {
        // protect urls
        if (Util::idStrip($id) != \Auth::id()) {
            abort(403, 'unauthorized action');
        }
    }
}
