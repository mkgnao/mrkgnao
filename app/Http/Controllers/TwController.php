<?php

namespace App\Http\Controllers;

use App\Http\BladeService as BladeService;
use App\Http\Requests;
use App\Http\TeamWorkPm;
use App\Models\TwCoupling as TwCoupling;
use Auth;
use DB;
use Illuminate\Http\Request;
use App\Util;

class TwController extends Controller
{
    const TW_API_COMPANY = 'mkgnao';

    protected $auth = false;
    protected $user_id;
    protected $tw_api_key;
    protected $tw_me;

    public function twAuth()
    {
        if (!$this->auth) {
            TeamWorkPm\Auth::set(self::TW_API_COMPANY, $this->tw_api_key);
            self::setTwMe();
            $this->auth = true;
        }
    }

    public function twGetById($what, $id)
    {
        $model = TeamWorkPm\Factory::build($what);
        $value = $model->get($id);

        return $value;
    }

    public function twGet($what)
    {
        $model = TeamWorkPm\Factory::build($what);
        $value = $model->get();

        return $value;
    }

    public function twGetAll($what)
    {
        $model = TeamWorkPm\Factory::build($what);
        $value = $model->getAll();

        return $value;
    }

    public function jsPut($var, $value)
    {
        $value = trim(preg_replace('/\s+/', ' ', $value));

        \JavaScript::put([$var => $value]);
    }

    public function setTwApiKey()
    {
        $tw_coupling = TwCoupling::find($this->user_id);

        if (!$tw_coupling) {
            return false;
        }

        $this->tw_api_key = $tw_coupling->tw_api_key;

        return true;
    }

    public function setTwIdIfNull()
    {
        $tw_coupling = TwCoupling::find($this->user_id);

        if ($tw_coupling->tw_id < 0) {
            $tw_coupling->tw_id = $this->tw_me->id;
            $tw_coupling->save();
        }
    }

    public function setTwMe()
    {
        $this->tw_me = self::twGet('me');
        self::jsPut('tw_me', $this->tw_me);
    }

    public function init()
    {
        self::setTwApiKey();
        self::twAuth();
        self::setTwIdIfNull();
    }

    public function index()
    {
    }
}