<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\TeamWorkPm;

class PersonController extends Controller
{
    // START configurtion
    const API_KEY = 'stripe730saloon';
    const API_COMPANY = 'mkgnao';
    private $model;


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
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index2()
    {
        return view('/u/main');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        static $auth = false;
        if (!$auth) {
            TeamWorkPm\Auth::set(self::API_COMPANY, self::API_KEY);
            $this->model = TeamWorkPm\Factory::build('projects');
            //TeamWorkPm\Rest::setFormat(API_FORMAT);
            $value = $this->model->get();
            $auth = true;
        }

        //$json_string = json_encode($account, JSON_PRETTY_PRINT);

        return view('/u/main', array('tw' => $value));
    }
}
