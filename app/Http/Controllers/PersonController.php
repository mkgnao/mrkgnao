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

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    private function twAuth()
    {
        static $auth = false;

        if (!$auth) {
            TeamWorkPm\Auth::set(self::API_COMPANY, self::API_KEY);
            $auth = true;
        }
    }

    private function twGet($what)
    {
        $model = TeamWorkPm\Factory::build($what);
        $value = $model->get();

        return $value;
    }

    private function twGetAll($what)
    {
        $model = TeamWorkPm\Factory::build($what);
        $value = $model->getAll();

        return $value;
    }

    private function jsPut($var, $value)
    {
        $value = trim(preg_replace('/\s+/', ' ', $value));

        \JavaScript::put([
            $var => $value
        ]);
    }

    private function putTwJsValues()
    {
        self::twauth();

        $value = self::twGet('account');
        self::jsPut('tw_account', $value);

        $value = self::twGetAll('project');
        self::jsPut('tw_project_all', $value);
    }

    /**
     * Show the user main page.
     *
     * @return Response
     */
    public function index()
    {
        self::putTwJsValues();

        return view('/u/main');
    }
}
