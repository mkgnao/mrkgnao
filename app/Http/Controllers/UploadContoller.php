<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\MdContent;

class UploadController extends Controller
{
    private static function save(Request $request, $id, $mdId)
    {
        $user = User::findOrFail($id);

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

        $path = 'u/'.$user->id.'/d/f/'.$mdFileName;

        $file->move($path);

        $content = Storage::get($path);

        $mdContent = MdContent::findOrFail($mdId);

        $mdContent->content = $content;

        $mdContent->save();

        Session::flash('message', 'saved');

        Storage::delete($mdFileName);

        return Redirect::route('/');
    }

    public function saveAbout(Request $request, $id)
    {
        return self::save($request, $id, 1);
    }

    public function saveWriters(Request $request, $id)
    {
        return self::save($request, $id, 2);
    }
    public function saveProjects(Request $request, $id)
    {
        return self::save($request, $id, 3);
    }
    public function savePartners(Request $request, $id)
    {
        return self::save($request, $id, 4);
    }
    public function saveInternships(Request $request, $id)
    {
        return self::save($request, $id, 5);
    }
    public function saveWelcome(Request $request, $id)
    {
        return self::save($request, $id, 6);
    }
}