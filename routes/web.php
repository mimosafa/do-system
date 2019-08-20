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

Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function () {

    Route::middleware('auth')->group(function () {

        /*
        |----------------------------------------------------------------------
        | Wstd Administrator Routes
        |----------------------------------------------------------------------
        */

        Route::get('/', 'HomeController@index')->name('home');

        Route::get('brands', 'BrandController@index')->name('brands.index');
        Route::post('brands/create', 'BrandController@store')->name('brands.store');
        Route::get('brands/{id}', 'BrandController@show')->name('brands.show');
        Route::post('brands/{id}', 'BrandController@update');

        Route::get('business-areas', 'BusinessAreaController@index')->name('businessAreas.index');

        Route::get('business-permits', 'BusinessPermitController@index')->name('businessPermits.index');
        Route::post('business-permits/create', 'BusinessPermitController@store')->name('businessPermits.store');
        Route::get('business-permits/{id}', 'BusinessPermitController@show')->name('businessPermits.show');
        Route::post('business-permits/{id}', 'BusinessPermitController@update');

        Route::get('cars', 'CarController@index')->name('cars.index');
        Route::post('cars/create', 'CarController@store')->name('cars.store');
        Route::get('cars/{id}', 'CarController@show')->name('cars.show');
        Route::post('cars/{id}', 'CarController@update');

        Route::get('health-centers', 'HealthCenterController@index')->name('healthCenters.index');

        Route::get('items', 'ItemController@index')->name('items.index');
        Route::post('items/create', 'ItemController@store')->name('items.store');
        Route::get('items/{id}', 'ItemController@show')->name('items.show');
        Route::post('items/{id}', 'ItemController@update');

        Route::get('municipalities', 'MunicipalityController@index')->name('municipalities.index');

        Route::get('vendors', 'VendorController@index')->name('vendors.index');
        Route::get('vendors/create', 'VendorController@create')->name('vendors.create');
        Route::post('vendors/create', 'VendorController@store');
        Route::get('vendors/{id}', 'VendorController@show')->name('vendors.show');
        Route::post('vendors/{id}', 'VendorController@update');

    });

});
