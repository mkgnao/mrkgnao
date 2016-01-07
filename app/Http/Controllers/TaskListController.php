<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\TeamWorkPm;
use Auth;
use DB;
use Illuminate\Http\Request;

class TaskListController extends TwController
{
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

    private function setTwTaskList()
    {
        $this->tw_task_list = parent::twGetById('task_List', $this->tw_me->id);
        parent::jsPut('tw_task_list', $this->tw_task_list);
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
            self::setTwTaskList();
        } catch (\Exception $e) {
            parent::jsPut('tw_errors', $e);
        }

        return \View::make('/u/tasklist');
    }
}
