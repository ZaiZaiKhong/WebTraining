<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', 'UserController@getIndex' );

Route::prefix('users')->group(function() {
    Route::get('add', 'UserController@getForm' );

    Route::get('{id}/edit', 'UserController@getForm');

    Route::get('{id}/delete', 'UserController@delete');

    Route::post('{id}/insert', 'UserController@postForm');

    Route::post('insert', 'UserController@postForm');
});
