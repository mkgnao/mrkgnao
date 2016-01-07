<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\TeamWorkPm;
use Auth;
use DB;
use Illuminate\Http\Request;

class CompanyController extends TwController
{
    private $tw_company;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    private function setTwCompany()
    {
        $this->company = parent::twGetAll('company');
        parent::jsPut('tw_company', $this->company);
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
            self::setTwCompany();
        } catch (\Exception $e) {
            parent::jsPut('tw_errors', $e);
        }

        return \View::make('/u/company');
    }
}
