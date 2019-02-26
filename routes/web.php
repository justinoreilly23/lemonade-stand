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

Route::get('/', 'LemonadeStand@__construct');

Route::get('/buy', 'PageController@formBuySupplies');
Route::post('/buy', 'LemonadeStand@setup');

Route::get('/continue', 'PageController@proceed');
Route::get('/simulate', 'PageController@simulate');
Route::get('/results', 'PageController@results');