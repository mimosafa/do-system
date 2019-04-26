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

});
