<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\MdContent as MdContent;
use Illuminate\Http\Request;


class MdController extends TwController
{
    public function index($aId, $pId)
    {
        \Log::info('in index');

        \Log::info('in index id = ' . $aId);

        \Log::info('in index $pId = ' . $pId);

        $mdContent = MdContent::where('md_name', $pId)->first();

        self::jsPut('mdContent', $mdContent);

        $this->user_id = \Auth::id();

        return \View::make('/a/p/editsite', array('md_name', $pId));
    }

    public function show($aId, $pId)
    {
        \Log::info('in index');

        \Log::info('in index id = ' . $aId);

        \Log::info('in index $pId = ' . $pId);

        $mdContent = MdContent::where('md_name', $pId)->first();

        self::jsPut('mdContent', $mdContent);

        $this->user_id = \Auth::id();

        return \View::make('/a/p/editsite', array('md_name', $pId));
    }

    /*
    public function create($id, $mdName)
    {
        \Log::info('in create');

        \Log::info('in create id = ' . $id);

        \Log::info('in create mdName = ' . $mdName);

        return \View::make('/a/p/editsite', array('md_name', $mdName));
    }

    public function show($id, $mdName)
    {
        \Log::info('in create');

        \Log::info('in create id = ' . $id);

        \Log::info('in create mdName = ' . $mdName);

        $mdContent = MdContent::where('md_name', $mdName)->first();

        self::jsPut('mdContent', $mdContent);

        return \View::make('/a/p/editsite', array('md_name', $mdName));
    }


    public function edit($id, $mdName)
    {
        \Log::info('in edit');

        \Log::info('in edit id = ' . $id);

        \Log::info('in edit mdName = ' . $mdName);

        $mdContent = MdContent::where('md_name', $mdName)->first();

        self::jsPut('mdContent', $mdContent);

        return \View::make('/a/p/editsite', array('md_name', $mdName));
    }

    public function update($id, $mdName)
    {
        \Log::info('in update');

        \Log::info('in update id = ' . $id);

        \Log::info('in update mdName = ' . $mdName);

        return \View::make('/a/p/editsite', array('md_name', $mdName));
    }

    public function destroy($id, $mdName)
    {
        \Log::info('in destroy');

        \Log::info('in destroy id = ' . $id);

        \Log::info('in destroy mdName = ' . $mdName);

        return \View::make('/a/p/editsite', array('md_name', $mdName));
    }

    public function store(Request $request)
    {
        $id = $request->input('id');
        $mdName = $request->input('md_name');
        $mdInputContent = $request->input('mdContent');

        \Log::info('in store');

        \Log::info('in store id = ' . $id);

        \Log::info('in store mdName = ' . $mdName);

        $mdContent = MdContent::where('md_name', $mdName)->first();

        if ($mdInputContent == $mdContent) {
            Session::flash('message', 'nothing new in '. $mdName);
            return \View::make('/a/p/editsite', array('md_name', $mdName));
        }

        $mdContent->md_content = $mdInputContent;

        $mdContent->save();

        Session::flash('message', 'updated ' . $mdName);

        return \View::make('/a/p/editsite', array('md_name', $mdName));
    }

    */
}
