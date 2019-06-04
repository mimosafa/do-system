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

// Hide '/home' (, for now...)
Route::redirect('/home', '/admin');

Route::namespace('Admin')->prefix('admin')->name('admin.')
    ->middleware('auth')->group(function () {

    /*
    |----------------------------------------------------------------------
    | Wstd Administrator Routes
    |----------------------------------------------------------------------
    */

    Route::get('/', function () {
        return view('home');
    });

    Route::get('cars', 'CarController@index')->name('cars.index');
    Route::post('cars/create', 'CarController@store')->name('cars.store');
    Route::get('cars/{id}', 'CarController@show')->name('cars.show');
    Route::post('cars/{id}', 'CarController@update');

    /** @todo */
    Route::post('cars/{id}/photos/store', 'CarController@storePhoto')->name('cars.photos.store');

    Route::get('items', 'ItemController@index')->name('items.index');

    Route::get('shops', 'ShopController@index')->name('shops.index');
    Route::post('shops/create', 'ShopController@store')->name('shops.store');
    Route::get('shops/{id}', 'ShopController@show')->name('shops.show');
    Route::post('shops/{id}', 'ShopController@update');

    Route::get('vendors', 'VendorController@index')->name('vendors.index');
    Route::get('vendors/create', 'VendorController@create')->name('vendors.create');
    Route::post('vendors/create', 'VendorController@store');
    Route::get('vendors/{id}', 'VendorController@show')->name('vendors.show');
    Route::post('vendors/{id}', 'VendorController@update');

});
