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

Route::view('/', 'index')->name('index');

Auth::routes();

Route::name('list.')->group(function () {
    Route::get('/list/{name}/edit', 'CheckListController@edit')->name('edit');
    Route::put('/list/{name}/update', 'CheckListController@update')->name('update');
    Route::post('/list/{name}/done', 'CheckListController@done')->name('done');
    Route::get('/list', 'CheckListController@index')->name('index');
    Route::get('/list/public', 'CheckListController@publicIndex')->name('public');
    Route::post('/list', 'CheckListController@store')->name('store');
    Route::get('/list/{name}', 'CheckListController@show')->name('show');

});
