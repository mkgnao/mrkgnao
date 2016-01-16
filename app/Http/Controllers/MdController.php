<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\MdContent as MdContent;
use Illuminate\Http\Request;


class MdController extends TwController
{
    public function index($id, $mdName)
    {
        \Log::info('in index');

        \Log::info('in index id = ' . $id);

        \Log::info('in index mdName = ' . $mdName);

        $mdContent = MdContent::where('md_name', $mdName)->first();

        self::jsPut('mdContent', $mdContent);

        $this->user_id = \Auth::id();

        return \View::make('/a/p/editsite', array('mdName', $mdName));
    }

    public function create($id, $mdName)
    {
        \Log::info('in create');

        \Log::info('in create id = ' . $id);

        \Log::info('in create mdName = ' . $mdName);
    }

    public function show($id, $mdName)
    {
        \Log::info('in create');

        \Log::info('in create id = ' . $id);

        \Log::info('in create mdName = ' . $mdName);

        $mdContent = MdContent::where('md_name', $mdName)->first();

        self::jsPut('mdContent', $mdContent);

        return \View::make('/a/p/editsite', array('mdName', $mdName));
    }


    public function edit($id, $mdName)
    {
        \Log::info('in edit');

        \Log::info('in edit id = ' . $id);

        \Log::info('in edit mdName = ' . $mdName);

        $mdContent = MdContent::where('md_name', $mdName)->first();

        self::jsPut('mdContent', $mdContent);

        return \View::make('/a/p/editsite', array('mdName', $mdName));
    }

    public function update($id, $mdName)
    {
        \Log::info('in update');

        \Log::info('in update id = ' . $id);

        \Log::info('in update mdName = ' . $mdName);
    }

    public function destroy($id, $mdName)
    {
        \Log::info('in destroy');

        \Log::info('in destroy id = ' . $id);

        \Log::info('in destroy mdName = ' . $mdName);
    }

    public function store(Request $request)
    {
        $id = $request->input('id');
        $mdName = $request->input('mdName');
        $mdInputContent = $request->input('mdContent');

        \Log::info('in store');

        \Log::info('in store id = ' . $id);

        \Log::info('in store mdName = ' . $mdName);

        $mdContent = MdContent::where('md_name', $mdName)->first();

        if ($mdInputContent == $mdContent) {
            Session::flash('message', 'nothing new in '. $mdName);
            return \View::make('/a/p/editsite', array('mdName', $mdName));
        }

        $mdContent->md_content = $mdInputContent;

        $mdContent->save();

        Session::flash('message', 'updated ' . $mdName);

        return \View::make('/a/p/editsite', array('mdName', $mdName));
    }
}
