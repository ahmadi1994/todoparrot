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
    return view('welcome');
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

    Route::get('/home', 'HomeController@index');
    Route::get('/about', 'AboutController@index');
    Route::resource('/list', 'listController');
    Route::get('contact',['as'=>'contact','uses'=>'AboutController@create']);
    Route::post('contact',['as'=>'contact_post','uses'=>'AboutController@store']);

    Route::resource('list.tasks', 'TasksController');

    Route::post('list/{lists}/tasks/{tasks}/complete',
        array('as' => 'complete_task', 'uses' => 'TasksController@complete'));

});


