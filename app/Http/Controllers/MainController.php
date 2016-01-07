<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\TeamWorkPm;
use Auth;
use DB;
use Illuminate\Http\Request;
use App\Util;

class MainController extends TwController
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
        if (!(idStrip(Util::idStrip($id)) != \Auth::id())) {
            abort(403, 'unauthorized action');
        }

        $this->user_id = \Auth::id();

        try {
            parent::init();
        } catch (\Exception $e) {
            parent::jsPut('tw_errors', $e);
        }

        return \View::make('/u/p/main');
    }
}
