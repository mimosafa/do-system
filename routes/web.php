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

Route::get('/', function () {
    return view('welcome');
});

// 全車両一覧
Route::get('/cars', 'CarController@index')->name('cars.index');

// 車両作成
Route::get('/cars/create', 'CarController@showCreateForm')->name('cars.create');
Route::post('/cars/create', 'CarController@create');

// 車両詳細
Route::get('/cars/{id}', 'CarController@show')->name('cars.show');

// 車両編集
Route::get('/cars/{id}/edit', 'CarController@showEditForm')->name('cars.edit');
Route::post('/cars/{id}/edit', 'CarController@edit');

// 事業者一覧
Route::get('/vendors', 'VendorController@index')->name('vendors.index');

// 事業者作成
Route::get('/vendors/create', 'VendorController@showCreateForm')->name('vendors.create');
Route::post('/vendors/create', 'VendorController@create');

// 事業者詳細
Route::get('/vendors/{id}', 'VendorController@show')->name('vendors.show');

// 事業者編集
Route::get('/vendors/{id}/edit', 'VendorController@showEditForm')->name('vendors.edit');
Route::post('/vendors/{id}/edit', 'VendorController@edit');

// 事業者に車両を作成
Route::get('/vendors/{id}/cars/create', 'CarController@showCreateForm')->name('cars.createWith');
