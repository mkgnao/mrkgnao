<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\MdContent;

class UploadController extends Controller
{
    private static function save(Request $request, $mdId)
    {

        if (!$request->has('name'))
            return Redirect::route('/');

        $mdName = 'fileid_'.$mdId;

        if ( $request->name != $mdName)
            return Redirect::route('/');

        if (!$request->hasFile($mdName))
            return Redirect::route('/');

        $file = $request->file($mdName);

        if (!$file->isValid())
            return Redirect::route('/');

        $mdFileName = $mdName.'_'.time();

        $path = 'u//d/f/'.$mdFileName;

        $file->move($path);

        $content = Storage::get($path);

        $mdContent = MdContent::findOrFail($mdId);

        $mdContent->content = $content;

        $mdContent->save();

        Session::flash('message', 'saved');

        Storage::delete($mdFileName);

        return Redirect::route('/');
    }

    public function saveAbout(Request $request)
    {
        return self::save($request, 1);
    }

    public function saveWriters(Request $request)
    {
        return self::save($request, 2);
    }
    public function saveProjects(Request $request)
    {
        return self::save($request, 3);
    }
    public function savePartners(Request $request)
    {
        return self::save($request, 4);
    }
    public function saveInternships(Request $request)
    {
        return self::save($request, 5);
    }
    public function saveWelcome(Request $request)
    {
        return self::save($request, 6);
    }
}