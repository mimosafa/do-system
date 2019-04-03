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

Route::get('/vendors', 'VendorController@index')->name('vendors.index');

Route::get('/vendors/create', 'VendorController@showCreateForm')->name('vendors.create');
Route::post('/vendors/create', 'VendorController@create');

Route::get('/vendors/{id}', 'VendorController@show')->name('vendors.show');
Route::get('/vendors/{id}/edit', 'VendorController@showEditForm')->name('vendors.edit');
Route::post('/vendors/{id}/edit', 'VendorController@edit');
