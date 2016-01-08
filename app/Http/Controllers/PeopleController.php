<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\TeamWorkPm;
use Auth;
use DB;
use Illuminate\Http\Request;

class PeopleController extends TwController
{
    private $tw_people;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    private function setTwPeople()
    {
        $this->people = parent::twGetAll('people');
        parent::jsPut('tw_people', $this->people);
    }

    /**
     * Show the user main page.
     *
     * @return Response
     */
    public function index()
    {
        $this->user_id = \Auth::id();

        try {
            parent::init();
            self::setTwPeople();
        } catch (\Exception $e) {
            parent::jsPut('tw_errors', $e);
        }

        return \View::make('/u/p/people');
    }
}
