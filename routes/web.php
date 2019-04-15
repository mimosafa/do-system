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

    // 事業者|車両|ブランド から出店者リスト追加
    Route::get('{models}/{id}/shops/create', 'ShopController@create')->name('shops.createWith');

    // ブランド一覧
    Route::get('brands', 'BrandController@index')->name('brands.index');

    // ブランド作成
    Route::get('brands/create', 'BrandController@create')->name('brands.create');
    Route::post('brands/create', 'BrandController@store');

    // ブランド詳細
    Route::get('brands/{id}', 'BrandController@show')->name('brands.show');

    // ブランド編集
    Route::get('brands/{id}/edit', 'BrandController@edit')->name('brands.edit');
    Route::post('brands/{id}/edit', 'BrandController@update');

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
    Route::get('shops', 'ShopController@index')->name('shops.index');

    // 出店者リストに新規追加
    Route::get('shops/create', 'ShopController@create')->name('shops.create');
    Route::post('shops/create', 'ShopController@store');

    // 出店者詳細
    Route::get('shops/{id}', 'ShopController@show')->name('shops.show');

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

    // 事業者からブランド作成
    Route::get('vendors/{id}/brands/create', 'BrandController@create')->name('brands.createWith');
    Route::post('vendors/{id}/brands/create', 'BrandController@create');

    // 事業者から車両作成
    Route::get('vendors/{id}/cars/create', 'CarController@create')->name('cars.createWith');
    Route::post('vendors/{id}/cars/create', 'CarController@store');

});
