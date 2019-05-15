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

Route::get('/practice_one', 'HomeController@praticeOne');
Route::get('/practice_two', 'HomeController@praticeTwo');

Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('top_up','TopupController');
Route::resource('withdraw','WithdrawController');
Route::resource('transfer','TransferController');
Route::get('mutasi','HomeController@mutasi');
