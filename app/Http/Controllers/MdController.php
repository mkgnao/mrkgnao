<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\MdContent as MdContent;
use Illuminate\Http\Request;

class MdController extends TwController
{
    public function edit()
    {
        $mdName = Input::get('mdName', array('mdName'));
        return \View::make('/u/p/edit', array('mdName', $mdName));
    }

    public function store()
    {
        $mdName = Input::get('mdName');
        $mdContent = MdContent::where('md_name', $mdName)->first();
        $inputContent = Input::get('textArea');

        if ($inputContent == $mdContent) {
            Session::flash('message', 'nothing new in '. $mdName);
            return;
        }

        $mdContent->md_content = $inputContent;

        $mdContent->save();

        Session::flash('message', 'updated ' . $mdName);
    }

    public function get()
    {
        $mdName = Input::get('id');
        $mdContent = MdContent::where('md_name', $mdName)->first();
        self::jsPut('mdContent', $mdContent);
    }
}
