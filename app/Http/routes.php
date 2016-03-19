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

Route::get('/', function () {
    return redirect('/login');
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

Route::group(['middleware' => ['web']], function () {
    Route::get('/login', 'AuthyController@loginPage');

    Route::get('/forgot', 'AuthyController@forgotPage');

    Route::get('/home', 'MainController@home');

    Route::post('/login/process','AuthyController@login');

    Route::get('/login/logout','AuthyController@logout');

    Route::post('/ajax/colorupd','AjaxController@colorUpd');

    Route::post('/ajax/colorget','AjaxController@colorGet');

    Route::get('/builder','MainController@builderPage');

    Route::get('/builder_init','MainController@builder');
});
