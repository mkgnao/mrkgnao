<?php

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

Route::get('partials.scriptsend', function () {
    return View::make('partials/scriptsend');
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
        return view('welcome');
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

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/', function () {
        //return Redirect::to('/u/' . \Auth::id() . '/main');
        return view('welcome');
    });

    Route::get('/u/' . '{id}' . '/main', array('as' => '/u/main', 'uses' => 'MainController@index'));

    Route::get('/u/' . '{id}' . '/tasklist', array('as' => '/u/tasklist', 'uses' => 'TaskListController@index'));

    Route::get('/u/' . '{id}' . '/company', array('as' => '/u/company', 'uses' => 'CompanyController@index'));

    Route::get('/u/' . '{id}' . '/people', array('as' => '/u/people', 'uses' => 'PeopleController@index'));

    Route::get('/u/' . '{id}' . '/projects', array('as' => '/u/projects', 'uses' => 'ProjectsController@index'));
});
