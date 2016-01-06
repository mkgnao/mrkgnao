<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\TeamWorkPm;

class PersonController extends Controller
{
    // START configurtion
    //const API_KEY = 'stripe730saloon';
    const API_COMPANY = 'mkgnao';

    private $api_key;

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
            TeamWorkPm\Auth::set(self::API_COMPANY, $this->api_key);
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

    private function setTwApiKey()
    {
        $tw_coupling = get();

        $user_id = Auth::user()->id;

        $tw_user_id = DB::table('tw_coupling')->where('id', $user_id)->value('tw_api_key');

        $this->api_key = $tw_user_id;
    }

    private function putTwJsValues()
    {
        //$value = self::twGet('account');
        //self::jsPut('tw_account', $value);

        $value = self::twGet('me');
        self::jsPut('tw_me', $value);

        //$value = self::twGetAll('project');
        //self::jsPut('tw_project_all', $value);
    }

    /**
     * Show the user main page.
     *
     * @return Response
     */
    public function index()
    {
        try {
            self::setTwApiKey();
            self::twAuth();
            self::putTwJsValues();
        } catch (Exception $e) {
            self::jsPut('tw_errors', $e);
        }

        return view('/u/main');
    }
}
