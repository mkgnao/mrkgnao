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
        $all = $request->all();

        \Log::info('writers: '.$all['writers']);

        $urlComp = explode("/", parse_url($request->server('HTTP_REFERER'), PHP_URL_PATH));

        if (count($urlComp) < 2)
            return '< 2, what is '.$urlComp;

        $uploadName = $urlComp[1];

        /*
        \Log::info('uploadName: '.$uploadName);

        \Log::info('urlComp: '.$urlComp);

        \Log::info('id: '.$mdId);

        \Log::info('request: '.$request);
        */

        $mdName = 'fileid_'.$mdId;

        if (!$request->hasFile($mdName))
            return 'fail in hasFile';

        $file = $request->file($mdName);

        if (!$file->isValid())
            return 'fail in isValid';

        $mdFileName = $mdName.'_'.time();

        $path = 'u//d/f/'.$mdFileName;

        $file->move($path);

        $content = Storage::get($path);

        $mdContent = MdContent::findOrFail($mdId);

        $mdContent->content = $content;

        $mdContent->save();

        Session::flash('message', 'saved');

        Storage::delete($mdFileName);

        return 'yay';
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