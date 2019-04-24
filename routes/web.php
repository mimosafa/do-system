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
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function() {

    Route::get('/', function() {
        return view('admin/home');
    });

    // 事業者|車両|店舗 から出店者リスト追加
    Route::get('{models}/{id}/kitchencars/create', 'KitchencarController@create')->name('kitchencars.createWith');

    // 店舗一覧
    Route::get('shops', 'ShopController@index')->name('shops.index');

    // 店舗作成
    Route::get('shops/create', 'ShopController@create')->name('shops.create');
    Route::post('shops/create', 'ShopController@store');

    // 店舗詳細
    Route::get('shops/{id}', 'ShopController@show')->name('shops.show');

    // 店舗編集
    Route::get('shops/{id}/edit', 'ShopController@edit')->name('shops.edit');
    Route::post('shops/{id}/edit', 'ShopController@update');

    // 車両一覧
    Route::get('cars', 'CarController@index')->name('cars.index');

    // 車両作成
    Route::get('cars/create', 'CarController@create')->name('cars.create');
    Route::post('cars/create', 'CarController@store');

    // 車両詳細
    Route::get('cars/{id}', 'CarController@show')->name('cars.show');

    // 車両編集
    Route::get('cars/{id}/edit', 'CarController@edit')->name('cars.edit');
    Route::post('cars/{id}/edit', 'CarController@update');

    // ファイル
    Route::get('files/upload', 'FileController@create')->name('files.create');
    Route::post('files/upload', 'FileController@store');

    // ジャンル一覧・作成
    Route::get('genres', 'GenreController@create')->name('genres.index');
    Route::post('genres', 'GenreController@store');

    // 出店者リスト
    Route::get('kitchencars', 'KitchencarController@index')->name('kitchencars.index');

    // 出店者リストに新規追加
    Route::get('kitchencars/create', 'KitchencarController@create')->name('kitchencars.create');
    Route::post('kitchencars/create', 'KitchencarController@store');

    // 出店者詳細
    Route::get('kitchencars/{id}', 'KitchencarController@show')->name('kitchencars.show');

    // 事業者一覧
    Route::get('vendors', 'VendorController@index')->name('vendors.index');

    // 事業者作成
    Route::get('vendors/create', 'VendorController@create')->name('vendors.create');
    Route::post('vendors/create', 'VendorController@store');

    // 事業者詳細
    Route::get('vendors/{id}', 'VendorController@show')->name('vendors.show');

    // 事業者編集
    Route::get('vendors/{id}/edit', 'VendorController@edit')->name('vendors.edit');
    Route::post('vendors/{id}/edit', 'VendorController@update');

    // 事業者から店舗作成
    Route::get('vendors/{id}/shops/create', 'ShopController@create')->name('shops.createWith');
    Route::post('vendors/{id}/shops/create', 'ShopController@create');

    // 事業者から車両作成
    Route::get('vendors/{id}/cars/create', 'CarController@create')->name('cars.createWith');
    Route::post('vendors/{id}/cars/create', 'CarController@store');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
