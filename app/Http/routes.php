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

Route::get('/', [ 'as' => 'index', 'uses' => 'produtoController@index']);

Route::group(['prefix' => 'produto'], function(){
    Route::get('novo', [ 'as' => 'produto.novo', 'uses' => 'produtoController@create']);
    Route::get('edita/{id}', [ 'as' => 'produto.edita', 'uses' => 'produtoController@edit']);
    Route::get('destroy/{id}', [ 'as' => 'produto.destroy', 'uses' => 'produtoController@destroy']);
    Route::put('update/{id}', [ 'as' => 'produto.update', 'uses' => 'produtoController@update']);
    Route::post('store', [ 'as' => 'produto.store', 'uses' => 'produtoController@store']);
});