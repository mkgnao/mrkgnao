<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\TeamWorkPm;
use DB;
use Auth;

class MainController extends Controller
{
    const TW_API_COMPANY = 'mkgnao';

    private $tw_api_key;
    private $tw_me;

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
            TeamWorkPm\Auth::set(self::TW_API_COMPANY, $this->tw_api_key);
            $auth = true;
        }
    }

    private function twGet($what)
    {
        $model = TeamWorkPm\Factory::build($what);
        $value = $model->get();

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
        $user_id = \Auth::id();

        $tw_coupling = DB::table('tw_coupling');

        $tw_api_key = $tw_coupling->find($user_id)->tw_api_key;

        $this->api_key = $tw_api_key;
    }


    private function setTwIdIfNull()
    {
        $user_id = \Auth::id();

        $tw_coupling = DB::table('tw_coupling');

        $tw_coupling_user = $tw_coupling->find($user_id);

        if ($tw_coupling_user->tw_id < 0) {
            $tw_coupling_user->tw_id = $this->tw_me->id;
            $tw_coupling_user->save();
        }
    }

    private function setTwMe()
    {
        $this->tw_me = self::twGet('me');
        self::jsPut('tw_me', $value);
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
            self::setTwMe();
            self::setTwIdIfNull();
        } catch (Exception $e) {
            self::jsPut('tw_errors', $e);
        }

        return view('/u/main');
    }
}
