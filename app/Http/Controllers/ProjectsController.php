<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\TeamWorkPm;
use Auth;
use DB;
use Illuminate\Http\Request;

class ProjectsController extends TwController
{
    private $tw_projects;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    private function setTwProjects()
    {
        $this->tw_projects = parent::twGetAll('project');
        parent::jsPut('tw_projects', $this->tw_projects);
    }

    /**
     * Show the user main page.
     *
     * @return Response
     */
    public function index($id)
    {
        parent::index($id);

        $this->user_id = \Auth::id();

        try {
            parent::init();
            self::setTwProjects();
        } catch (\Exception $e) {
            parent::jsPut('tw_errors', $e);
        }

        return \View::make('/u/p/projects');
    }
}
