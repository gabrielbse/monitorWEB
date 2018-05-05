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
Route::auth();

Route::get('/', 'HomeController@index');

Route::group(['middleware' => ['auth']], function() {  
    Route::group(['prefix' => 'temperatura', 'where' => ['id' => '[0-9]+']], function() {
        Route::get('', ['as' => 'temperatura.index', 'uses' => 'TemperaturaController@index', 'middleware' => ['permission:temperatura']]);;
        Route::get('/temperatura', ['as' => 'temperatura.coleta', 'uses' => 'TemperaturaController@coleta', 'middleware' => ['permission:temperatura']]);
    });

    Route::group(['prefix' => 'umidade', 'where' => ['id' => '[0-9]+']], function() {
        Route::get('', ['as' => 'umidade.index', 'uses' => 'UmidadeController@index', 'middleware' => ['permission:umidade']]);
        Route::get('/umidade', ['as' => 'umidade.coleta', 'uses' => 'UmidadeController@coleta', 'middleware' => ['permission:umidade']]);
    });

    Route::group(['prefix' => 'altitude', 'where' => ['id' => '[0-9]+']], function() {
        Route::get('', ['as' => 'altitude.index', 'uses' => 'AltitudeController@index', 'middleware' => ['permission:altitude']]);;
        Route::get('/altitude', ['as' => 'altitude.coleta', 'uses' => 'AltitudeController@coleta', 'middleware' => ['permission:altitude']]);
    });

    Route::group(['prefix' => 'pressao', 'where' => ['id' => '[0-9]+']], function() {
        Route::get('', ['as' => 'pressao.index', 'uses' => 'PressaoController@index', 'middleware' => ['permission:pressao']]);
        Route::get('/pressao', ['as' => 'pressao.coleta', 'uses' => 'PressaoController@coleta', 'middleware' => ['permission:pressao']]);
    });

    Route::group(['prefix' => 'configuracoes', 'where' => ['id' => '[0-9]+']], function() {
        Route::get('', ['as' => 'configuracoes.index', 'uses' => 'ConfiguracoesController@index', 'middleware' => ['permission:configuracoes']]);
        Route::post('/store', ['as' => 'configuracoes.store', 'uses' => 'ConfiguracoesController@store', 'middleware' => ['permission:configuracoes']]);
    });

    Route::group(['prefix' => 'alertas', 'where' => ['id' => '[0-9]+']], function() {
        Route::get('', ['as' => 'alertas.index', 'uses' => 'AlertasController@index', 'middleware' => ['permission:alertas']]);
        Route::post('/store', ['as' => 'alertas.store', 'uses' => 'AlertasController@store', 'middleware' => ['permission:alertas']]);
    });
});