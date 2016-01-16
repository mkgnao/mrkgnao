<?php

use Illuminate\Support\Facades\Log;

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

Route::get('partials.appscriptvars', function () {
    return View::make('partials/appscriptvars');
});

Route::get('partials.topnav', function () {
    return View::make('partials/topnav');
});

View::composer('*', function ($view) {
    View::share('view_name', $view->getName());
});


Route::group(['middleware' != 'web'], function () {
    Route::get('/fonts', function () {
        //fonts
    });

    Route::get('/js', function () {
        //js
    });

    Route::get('/css', function () {
        //css
    });

    Route::get('/img', function () {
        //img
    });

    Route::get('/', function () {
        return view('mdcontent', array('name' => 'welcome'));
    });

    Route::get('/about', function () {
        return view('mdcontent', array('name' => 'about'));
    });

    Route::get('/writers', function () {
        return view('mdcontent', array('name' => 'writers'));
    });

    Route::get('/projects', function () {
        return view('mdcontent', array('name' => 'projects'));
    });

    Route::get('/partners', function () {
        return view('mdcontent', array('name' => 'partners'));
    });

    Route::get('/internships', function () {
        return view('mdcontent', array('name' => 'internships'));
    });
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => 'web'], function ($view) {
    Route::auth();

    Route::get('/', function () {
        return view('mdcontent', array('name' => 'welcome'));
    });

    Route::put('/md/update', array('as' => '/md/show', 'uses' => 'MdController@update'));

    Route::get('/md/{id}', 'MdController@show');

    Route::resource('md', 'MdController');

    Route::get('/u/{id}/p/main', array('as' => '/u/p/main', 'uses' => 'MainController@index'));

    Route::get('/u/{id}/p/tasklist', array('as' => '/u/p/tasklist', 'uses' => 'TaskListController@index'));

    Route::get('/u/{id}/p/company', array('as' => '/u/p/company', 'uses' => 'CompanyController@index'));

    Route::get('/u/{id}/p/people', array('as' => '/u/p/people', 'uses' => 'PeopleController@index'));

    Route::get('/u/{id}/p/projects', array('as' => '/u/p/projects', 'uses' => 'ProjectsController@index'));
});
