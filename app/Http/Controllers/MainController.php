<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\TeamWorkPm;
use App\TwCoupling as TwCoupling;
use Auth;
use DB;
use Illuminate\Http\Request;

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
        $tw_coupling = TwCoupling::find($this->user_id);

        if ($tw_coupling == null) {
            return false;
        }

        $this->tw_api_key = $tw_coupling->tw_api_key;

        return true;
    }


    private function setTwIdIfNull()
    {
        $tw_coupling = TwCoupling::find($this->user_id);

        if ($tw_coupling->tw_id < 0) {
            $tw_coupling->tw_id = $this->tw_me->id;
            $tw_coupling->save();
        }
    }

    private function setTwMe()
    {
        $this->tw_me = self::twGet('me');
        self::jsPut('tw_me', $this->tw_me);
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
            if (self::setTwApiKey()) {
                self::twAuth();
                self::setTwMe();
                self::setTwIdIfNull();
            }
        } catch (Exception $e) {
            self::jsPut('tw_errors', $e);
        }

        return view('/u/main');
    }
}
