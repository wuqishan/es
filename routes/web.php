<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Route::get('/documents', ['as' => 'document.index', 'uses' => 'DocumentController@index']);
Route::get('/documents/add', ['as' => 'document.add', 'uses' => 'DocumentController@add']);
Route::get('/documents/get', ['as' => 'document.getById', 'uses' => 'DocumentController@getById']);
Route::get('/documents/delete', ['as' => 'document.deleteById', 'uses' => 'DocumentController@deleteById']);
Route::get('/documents/search', ['as' => 'document.search', 'uses' => 'DocumentController@getByFieldsContent']);
Route::get('/documents/delete_index', ['as' => 'document.deleteIndex', 'uses' => 'DocumentController@deleteIndex']);