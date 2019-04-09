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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// 管理者専用ページ
Route::prefix('admin')->middleware('auth')->group(function() {

    // 車両一覧
    Route::get('cars', 'CarController@index')->name('admin.cars.index');

    // 車両作成
    Route::get('cars/create', 'CarController@create')->name('admin.cars.create');
    Route::post('cars/create', 'CarController@store');

    // 車両詳細
    Route::get('cars/{id}', 'CarController@show')->name('admin.cars.show');

    // 事業者一覧
    Route::get('vendors', 'VendorController@index')->name('admin.vendors.index');

    // 事業者作成
    Route::get('vendors/create', 'VendorController@create')->name('admin.vendors.create');
    Route::post('vendors/create', 'VendorController@store');

    // 事業者詳細
    Route::get('vendors/{id}', 'VendorController@show')->name('admin.vendors.show');

    // 事業者詳細から車両作成
    Route::get('vendors/{id}/cars/create', 'CarController@create')->name('admin.cars.createWith');
    Route::post('vendors/{id}/cars/create', 'CarController@store');

});
