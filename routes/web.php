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

Route::get('/', 'CheckListController@view')->name('index');

Auth::routes();

Route::post('/create', 'CheckListController@create')->name('newCheckList');
Route::get('/list', 'CheckListController@showList')->name('list');
Route::get('/list/{name}', 'CheckListController@showItem')->name('showCheckList');
Route::post('/list/{name}/save', 'CheckListController@saveList')->name('saveList');
Route::get('/list/{name}/edit', 'CheckListController@editList')->name('editList');
Route::post('/list/{name}/update', 'CheckListController@updateList')->name('updateList');
