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


Route::post('bid', 'BidController@store')->name('bid.store');
Route::get('bid', 'BidController@index')->name('bid.index');
Route::get('bid/create', 'BidController@create')->name('bid.create');
Route::get('bid/{bid}', 'BidController@show')->name('bid.show');
Route::match(['put', 'patch'], 'bid/{bid}', 'BidController@markAsViewed')->name('bid.markAsViewed');
