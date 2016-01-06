<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\TeamWorkPm;
use DB;
use Auth;
use App\TwCoupling as TwCoupling;

class MainController extends Controller
{
    const TW_API_COMPANY = 'mkgnao';

    private $tw_api_key;
    private $tw_me;
    private $tw_task_list;

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

    private function twGetById($what, $id)
    {
        $model = TeamWorkPm\Factory::build($what);
        $value = $model->get($id);

        return $value;
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

        $this->tw_api_key = $tw_coupling->tw_api_key;
    }

    private function setTwMe()
    {
        $this->tw_me = self::twGet('me');
        self::jsPut('tw_me', $this->tw_me);
    }

    private function setTwTaskList()
    {
        $this->tw_task_list = self::twGetById('task_List', $this->tw_me->id);
        self::jsPut('tw_task_list', $this->tw_task_list);
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
            //self::setTwApiKey();
            //self::twAuth();
            //self::setTwMe();
            //self::setTwTaskList();
        } catch (Exception $e) {
            self::jsPut('tw_errors', $e);
        }

        return view('/u/tasklist');
    }
}
