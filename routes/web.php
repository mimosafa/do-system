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

    // ブランド一覧
    Route::get('brands', 'BrandController@index')->name('admin.brands.index');

    // ブランド作成
    Route::get('brands/create', 'BrandController@create')->name('admin.brands.create');
    Route::post('brands/create', 'BrandController@store');

    // ブランド詳細
    Route::get('brands/{id}', 'BrandController@show')->name('admin.brands.show');

    // ブランド編集
    Route::get('brands/{id}/edit', 'BrandController@edit')->name('admin.brands.edit');
    Route::post('brands/{id}/edit', 'BrandController@update');

    // 車両一覧
    Route::get('cars', 'CarController@index')->name('admin.cars.index');

    // 車両作成
    Route::get('cars/create', 'CarController@create')->name('admin.cars.create');
    Route::post('cars/create', 'CarController@store');

    // 車両詳細
    Route::get('cars/{id}', 'CarController@show')->name('admin.cars.show');

    // 車両編集
    Route::get('cars/{id}/edit', 'CarController@edit')->name('admin.cars.edit');
    Route::post('cars/{id}/edit', 'CarController@update');

    // ファイル
    Route::get('files/upload', 'FileController@create')->name('admin.files.create');
    Route::post('files/upload', 'FileController@store');

    // 事業者一覧
    Route::get('vendors', 'VendorController@index')->name('admin.vendors.index');

    // 事業者作成
    Route::get('vendors/create', 'VendorController@create')->name('admin.vendors.create');
    Route::post('vendors/create', 'VendorController@store');

    // 事業者詳細
    Route::get('vendors/{id}', 'VendorController@show')->name('admin.vendors.show');

    // 事業者編集
    Route::get('vendors/{id}/edit', 'VendorController@edit')->name('admin.vendors.edit');
    Route::post('vendors/{id}/edit', 'VendorController@update');

    // 事業者詳細から車両作成
    Route::get('vendors/{id}/cars/create', 'CarController@create')->name('admin.cars.createWith');
    Route::post('vendors/{id}/cars/create', 'CarController@store');

});
