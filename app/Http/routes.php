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

Route::get('/', 'WelcomeController@index');

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
    //
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::resource('dashboard', 'DashboardController');
    Route::resource('department', 'DepartmentsController');
    Route::resource('type', 'TypesController');
    Route::resource('position', 'PositionsController');
    Route::resource('user', 'UsersController');
    Route::resource('balance', 'BalancesController');
    Route::resource('application', 'ApplicationsController');
    Route::resource('currentbalance', 'CurrentBalanceController');

    Route::resource('calendar', 'CalendarController');
    Route::resource('profile', 'ProfileController');

    Route::get('application/{id}/forward', 'ApplicationsController@forwardApplication');
    Route::get('application/{id}/approve', 'ApplicationsController@approveApplication');
    Route::get('application/{id}/deny', 'ApplicationsController@denyApplication');

    Route::get('people', 'PagesController@people');
});
