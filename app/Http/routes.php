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

Route::group(['prefix' => 'logar', 'as' => 'login.'], function () {

    Route::get('/', ['as' => 'index', 'uses' => 'LoginController@index']);
    Route::get('/criar', ['as' => 'register', 'uses' => 'LoginController@register']);
    Route::get('/deslogar', ['as' => 'logout', 'uses' => 'LoginController@logout']);
    Route::post('/logar', ['as' => 'auth', 'uses' => 'LoginController@auth']);
    Route::post('/criar', ['as' => 'create', 'uses' => 'LoginController@create']);
});

Route::group(['prefix' => 'app', 'as' => 'app.', 'namespace' => 'App', 'middleware' => 'check'], function () {

    Route::get('/', ['as' => 'index', 'uses' => 'DashboardController@index']);

    Route::group(['prefix' => 'demandas', 'as' => 'demand.'], function () {

        Route::get('/', ['as' => 'index', 'uses' => 'DemandController@index']);
        Route::get('/criar', ['as' => 'create', 'uses' => 'DemandController@create']);
        Route::post('/responder', ['as' => 'responder', 'uses' => 'DemandController@responder']);
        Route::post('/pergunta', ['as' => 'ask', 'uses' => 'DemandController@askSalve']);
        Route::get('/encaminhar/{id}', ['as' => 'encaminhar', 'uses' => 'DemandController@encaminharMe']);
        Route::post('/salvar', ['as' => 'store', 'uses' => 'DemandController@store']);
        Route::post('/salve-me', ['as' => 'storeMe', 'uses' => 'DemandController@storeMe']);
        Route::get('/editar/{id}', ['as' => 'edit', 'uses' => 'DemandController@edit']);
        Route::get('/mostrar/{id}', ['as' => 'show', 'uses' => 'DemandController@show']);
        Route::get('/excluir/{id}', ['as' => 'destroy', 'uses' => 'DemandController@destroy']);
        Route::post('/atualizar/{id}', ['as' => 'update', 'uses' => 'DemandController@update']);
    });

    Route::group(['prefix' => 'eventos', 'as' => 'eventos.'], function () {

        Route::get('/', ['as' => 'index', 'uses' => 'EventosController@index']);
        Route::get('/criar', ['as' => 'create', 'uses' => 'EventosController@create']);
        Route::post('/salvar', ['as' => 'store', 'uses' => 'EventosController@store']);
        Route::get('/editar/{id}', ['as' => 'edit', 'uses' => 'EventosController@edit']);
        Route::get('/mostrar/{id}', ['as' => 'show', 'uses' => 'EventosController@show']);
        Route::post('/atualizar', ['as' => 'update', 'uses' => 'EventosController@update']);
        Route::get('/deletar/{id}', ['as' => 'delete', 'uses' => 'EventosController@delete']);
        Route::get('/pendentes', ['as' => 'pendentes', 'uses' => 'EventosController@pendentes']);
        Route::post('/aprovar', ['as' => 'aprovar', 'uses' => 'EventosController@aprovar']);
        Route::post('/rejeitar', ['as' => 'rejeitar', 'uses' => 'EventosController@rejeitar']);
    });

    Route::group(['prefix' => 'oportunidades', 'as' => 'oportunidades.'], function () {

        Route::get('/', ['as' => 'index', 'uses' => 'OportunidadesController@index']);
        Route::get('/criar', ['as' => 'create', 'uses' => 'OportunidadesController@create']);
        Route::post('/salvar', ['as' => 'store', 'uses' => 'OportunidadesController@store']);
        Route::get('/editar/{id}', ['as' => 'edit', 'uses' => 'OportunidadesController@edit']);
        Route::get('/mostrar/{id}', ['as' => 'show', 'uses' => 'OportunidadesController@show']);
        Route::post('/atualizar', ['as' => 'update', 'uses' => 'OportunidadesController@update']);
        Route::get('/deletar/{id}', ['as' => 'delete', 'uses' => 'OportunidadesController@delete']);
    });

    Route::group(['prefix' => 'mentores', 'as' => 'mentor.'], function () {

        Route::get('/', ['as' => 'index', 'uses' => 'MentorController@index']);
        Route::get('/criar', ['as' => 'create', 'uses' => 'MentorController@create']);
        Route::post('/salvar', ['as' => 'store', 'uses' => 'MentorController@store']);
        Route::get('/mostrar/{id}', ['as' => 'show', 'uses' => 'MentorController@show']);
        Route::get('/conhecimento/{id}', ['as' => 'area', 'uses' => 'MentorController@area']);
        Route::post('/conhecimento/salvar', ['as' => 'area.store', 'uses' => 'MentorController@areaStore']);
    });
});



