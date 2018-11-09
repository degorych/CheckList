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

Route::post('/list/{name}/done', 'CheckListController@done')->name('list.done');
Route::get('/list', 'CheckListController@index')->name('list.index');
Route::post('/list', 'CheckListController@store')->name('list.store');
Route::get('/list/{name}', 'CheckListController@show')->name('list.show');
Route::get('/list/{name}/edit', 'CheckListController@edit')->name('list.edit');
Route::put('/list/{name}/update', 'CheckListController@update')->name('list.update');
