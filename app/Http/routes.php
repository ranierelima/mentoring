<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['prefix' => 'login', 'as' => 'login.'], function () {

    Route::get('/', ['as' => 'index', 'uses' => 'LoginController@index']);

    Route::get('/logout', ['as' => 'logout', 'uses' => 'LoginController@logout']);

    Route::post('/auth', ['as' => 'auth', 'uses' => 'LoginController@auth']);

});

Route::group(['prefix' => 'app', 'as' => 'app.', 'namespace' => 'App', 'middleware' => 'check'], function () {

    Route::get('/', ['as' => 'index', 'uses' => 'DashboardController@index']);


    Route::group(['prefix' => 'demandas', 'as' => 'demand.'], function () {

        Route::get('/', ['as' => 'index', 'uses' => 'DemandController@index']);

        Route::get('/create', ['as' => 'create', 'uses' => 'DemandController@create']);

        Route::post('/store', ['as' => 'store', 'uses' => 'DemandController@store']);

        Route::get('/edit/{id}', ['as' => 'edit', 'uses' => 'DemandController@edit']);

        Route::post('/update', ['as' => 'update', 'uses' => 'DemandController@update']);


    });

});
