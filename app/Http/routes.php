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
    Route::get('remove/{id}', [ 'as' => 'produto.remove', 'uses' => 'produtoController@remove']);
    Route::get('destroy/{id}', [ 'as' => 'produto.destroy', 'uses' => 'produtoController@destroy']);
    Route::put('update/{id}', [ 'as' => 'produto.update', 'uses' => 'produtoController@update']);
    Route::post('store', [ 'as' => 'produto.store', 'uses' => 'produtoController@store']);
});

Route::group(['prefix' => 'categoria'], function(){
    Route::get('index', [ 'as' => 'categoria.index', 'uses' => 'categoriaController@index']);
    Route::get('novo', [ 'as' => 'categoria.novo', 'uses' => 'categoriaController@create']);
    Route::get('edita/{id}', [ 'as' => 'categoria.edita', 'uses' => 'categoriaController@edit']);
    Route::get('remove/{id}', [ 'as' => 'categoria.remove', 'uses' => 'categoriaController@remove']);
    Route::get('destroy/{id}', [ 'as' => 'categoria.destroy', 'uses' => 'categoriaController@destroy']);
    Route::put('update/{id}', [ 'as' => 'categoria.update', 'uses' => 'categoriaController@update']);
    Route::post('store', [ 'as' => 'categoria.store', 'uses' => 'categoriaController@store']);
});
Route::group(['prefix' => 'fornecedor'], function(){
    Route::get('index', [ 'as' => 'fornecedor.index', 'uses' => 'fornecedorController@index']);
    Route::get('novo', [ 'as' => 'fornecedor.novo', 'uses' => 'fornecedorController@create']);
    Route::get('edita/{id}', [ 'as' => 'fornecedor.edita', 'uses' => 'fornecedorController@edit']);
    Route::get('remove/{id}', [ 'as' => 'fornecedor.remove', 'uses' => 'fornecedorController@remove']);
    Route::get('destroy/{id}', [ 'as' => 'fornecedor.destroy', 'uses' => 'fornecedorController@destroy']);
    Route::put('update/{id}', [ 'as' => 'fornecedor.update', 'uses' => 'fornecedorController@update']);
    Route::post('store', [ 'as' => 'fornecedor.store', 'uses' => 'fornecedorController@store']);
});