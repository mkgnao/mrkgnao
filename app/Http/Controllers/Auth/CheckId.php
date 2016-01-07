<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\TeamWorkPm;
use Auth;
use DB;
use Illuminate\Http\Request;
use App\Util;

class CheckId
{
    public static function check($id)
    {
        // protect urls
        if (Util::idStrip($id) != \Auth::id()) {
            abort(403, 'unauthorized action');
        }
    }
}
