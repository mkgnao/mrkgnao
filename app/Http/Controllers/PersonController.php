<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\TeamWorkPm;
use Laracasts\Utilities\JavaScript\JavaScriptServiceProvider;

class PersonController extends Controller
{
    // START configurtion
    const API_KEY = 'stripe730saloon';
    const API_COMPANY = 'mkgnao';
    private $model;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index2()
    {
        return view('/u/main');
    }

    function prettyPrint($json)
    {
        $result = '';
        $level = 0;
        $in_quotes = false;
        $in_escape = false;
        $ends_line_level = NULL;
        $json_length = strlen( $json );

        for( $i = 0; $i < $json_length; $i++ ) {
            $char = $json[$i];
            $new_line_level = NULL;
            $post = "";
            if( $ends_line_level !== NULL ) {
                $new_line_level = $ends_line_level;
                $ends_line_level = NULL;
            }
            if ( $in_escape ) {
                $in_escape = false;
            } else if( $char === '"' ) {
                $in_quotes = !$in_quotes;
            } else if( ! $in_quotes ) {
                switch( $char ) {
                    case '}': case ']':
                    $level--;
                    $ends_line_level = NULL;
                    $new_line_level = $level;
                    break;

                    case '{': case '[':
                    $level++;
                    case ',':
                        $ends_line_level = $level;
                        break;

                    case ':':
                        $post = " ";
                        break;

                    case " ": case "\t": case "\n": case "\r":
                    $char = "";
                    $ends_line_level = $new_line_level;
                    $new_line_level = NULL;
                    break;
                }
            } else if ( $char === '\\' ) {
                $in_escape = true;
            }
            if( $new_line_level !== NULL ) {
                $result .= "\n".str_repeat( "\t", $new_line_level );
            }
            $result .= $char.$post;
        }

        return $result;
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        static $auth = false;
        if (!$auth) {
            TeamWorkPm\Auth::set(self::API_COMPANY, self::API_KEY);
            $this->model = TeamWorkPm\Factory::build('account');
            //TeamWorkPm\Rest::setFormat(API_FORMAT);
            $value = $this->model->get();
            $auth = true;
        }

        \Laracasts\Utilities\JavaScript\JavaScriptFacade::put([
            'tw' => $value
        ]);

        return view('/u/main');
    }
}
