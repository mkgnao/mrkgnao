<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\MdContent as MdContent;
use Illuminate\Http\Request;


class MdController extends TwController
{

    public function updateWriters(Request $request)
    {
        $mdInputContent = $request->input('mdContent');

        $mdContent = MdContent::where('md_name', 'writers')->first();

        if ($mdInputContent == $mdContent) {
            Session::flash('message', 'nothing new');
            return \View::make('editsite');
        }

        $mdContent->md_content = $mdInputContent;

        $mdContent->save();

        Session::flash('message', 'updated');

        return \View::make('editsite');
    }
}
