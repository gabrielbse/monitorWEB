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
       
       //Rotas de Usuário
    Route::group(['prefix' => 'users', 'where' => ['id' => '[0-9]+']], function() {
        Route::get('', ['as' => 'users.index', 'uses' => 'UserController@index', 'middleware' => ['permission:usuario-list|usuario-create|usuario-edit|usuario-delete']]);
        Route::get('/acende',['as' => 'users.acende', 'uses' => 'UserController@acende', 'middleware' => ['permission:usuario-list']]);
        Route::get('/apaga', ['as' => 'users.apaga', 'uses' => 'UserController@apaga', 'middleware' => ['permission:usuario-create']]);
        
    });
    Route::group(['prefix' => 'temperatura', 'where' => ['id' => '[0-9]+']], function() {
        Route::get('', ['as' => 'temperatura.index', 'uses' => 'TemperaturaController@index', 'middleware' => ['permission:temperatura-list|temperatura-create|temperatura-edit|temperatura-delete']]);;
        Route::get('/temperatura', ['as' => 'temperatura.coleta', 'uses' => 'TemperaturaController@coleta', 'middleware' => ['permission:temperatura-create']]);
    });

    Route::group(['prefix' => 'umidade', 'where' => ['id' => '[0-9]+']], function() {
        Route::get('', ['as' => 'umidade.index', 'uses' => 'UmidadeController@index', 'middleware' => ['permission:umidade-list|umidade-create|umidade-edit|umidade-delete']]);
        Route::get('/umidade', ['as' => 'umidade.coleta', 'uses' => 'UmidadeController@coleta', 'middleware' => ['permission:umidade-create']]);
    });

    Route::group(['prefix' => 'altitude', 'where' => ['id' => '[0-9]+']], function() {
        Route::get('', ['as' => 'altitude.index', 'uses' => 'AltitudeController@index', 'middleware' => ['permission:altitude-list|altitude-create|altitude-edit|altitude-delete']]);;
        Route::get('/altitude', ['as' => 'altitude.coleta', 'uses' => 'AltitudeController@coleta', 'middleware' => ['permission:altitude-create']]);
    });

    Route::group(['prefix' => 'pressao', 'where' => ['id' => '[0-9]+']], function() {
        Route::get('', ['as' => 'pressao.index', 'uses' => 'PressaoController@index', 'middleware' => ['permission:pressao-list|pressao-create|pressao-edit|pressao-delete']]);
        Route::get('/pressao', ['as' => 'pressao.coleta', 'uses' => 'PressaoController@coleta', 'middleware' => ['permission:pressao-create']]);
    });

    //Rotas de Roles
    Route::group(['prefix' => 'roles', 'where' => ['id' => '[0-9]+']], function() {
        Route::get('', ['as' => 'roles.index', 'uses' => 'RoleController@index', 'middleware' => ['permission:role-list|role-create|role-edit|role-delete']]);
        Route::get('/list',['as' => 'roles.list', 'uses' => 'RoleController@listar', 'middleware' => ['permission:role-list']]);
    });
});