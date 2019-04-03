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
