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

Route::get('/', function () {
    return redirect()->route('login.index');
});


Route::group(['prefix' => 'login', 'as' => 'login.'], function () {

    Route::get('/', ['as' => 'index', 'uses' => 'LoginController@index']);

    Route::get('/register', ['as' => 'register', 'uses' => 'LoginController@register']);

    Route::get('/logout', ['as' => 'logout', 'uses' => 'LoginController@logout']);

    Route::post('/auth', ['as' => 'auth', 'uses' => 'LoginController@auth']);
    Route::post('/create', ['as' => 'create', 'uses' => 'LoginController@create']);

});

Route::group(['prefix' => 'app', 'as' => 'app.', 'namespace' => 'App', 'middleware' => 'check'], function () {

    Route::get('/', ['as' => 'index', 'uses' => 'DashboardController@index']);


    Route::group(['prefix' => 'demandas', 'as' => 'demand.'], function () {

        Route::get('/', ['as' => 'index', 'uses' => 'DemandController@index']);

        Route::get('/create', ['as' => 'create', 'uses' => 'DemandController@create']);

        //Mudar verbo
        Route::post('/responder', ['as' => 'responder', 'uses' => 'DemandController@responder']);

        //Mudar verbo
        Route::post('/ask', ['as' => 'ask', 'uses' => 'DemandController@askSalve']);

        Route::get('/encaminhar/{id}', ['as' => 'encaminhar', 'uses' => 'DemandController@encaminharMe']);

        Route::post('/store', ['as' => 'store', 'uses' => 'DemandController@store']);

        //Mudar verbo
        Route::post('/storeMe', ['as' => 'storeMe', 'uses' => 'DemandController@storeMe']);

        Route::get('/edit/{id}', ['as' => 'edit', 'uses' => 'DemandController@edit']);

        Route::get('/show/{id}', ['as' => 'show', 'uses' => 'DemandController@show']);

        Route::post('/update', ['as' => 'update', 'uses' => 'DemandController@update']);

    });
	
	Route::group(['prefix' => 'eventos', 'as' => 'eventos.'], function () {
//	    Inicio rotas crud eventos
        Route::get('/', ['as' => 'index', 'uses' => 'EventosController@index']);
        Route::get('/create', ['as' => 'create', 'uses' => 'EventosController@create']);
        Route::post('/store', ['as' => 'store', 'uses' => 'EventosController@store']);

        Route::get('/edit/{id}', ['as' => 'edit', 'uses' => 'EventosController@edit']);
        Route::get('/show/{id}', ['as' => 'show', 'uses' => 'EventosController@show']);
        Route::post('/update', ['as' => 'update', 'uses' => 'EventosController@update']);
        Route::post('/delete', ['as' => 'delete', 'uses' => 'EventosController@delete']);
//      Fim rotas crud eventos

//      Inicio rotas eventos pendentes
        Route::get('/pendentes', ['as' => 'pendentes', 'uses' => 'EventosController@pendentes']);
        Route::post('/aprovar', ['as' => 'aprovar', 'uses' => 'EventosController@aprovar']);
        Route::post('/rejeitar', ['as' => 'rejeitar', 'uses' => 'EventosController@rejeitar']);
//      Fim rotas eventos pendentes
    });
	
	Route::group(['prefix' => 'oportunidades', 'as' => 'oportunidades.'], function () {
        Route::get('/', ['as' => 'index', 'uses' => 'OportunidadesController@index']);
        Route::get('/create', ['as' => 'create', 'uses' => 'OportunidadesController@create']);
        Route::post('/store', ['as' => 'store', 'uses' => 'OportunidadesController@store']);
		
        Route::get('/edit/{id}', ['as' => 'edit', 'uses' => 'OportunidadesController@edit']);
        Route::get('/show/{id}', ['as' => 'show', 'uses' => 'OportunidadesController@show']);
        Route::post('/update', ['as' => 'update', 'uses' => 'OportunidadesController@update']);
        Route::post('/delete', ['as' => 'delete', 'uses' => 'OportunidadesController@delete']);
    });







});

