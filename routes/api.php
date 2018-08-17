<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'users'], function() {
    Route::get('/', 'Api\UserController@all');
    Route::get('/{id}', 'Api\UserController@get');
});

Route::group(['prefix' => 'bookings'], function() {
    Route::get('/', 'Api\BookingController@all');
    Route::get('/{id}', 'Api\BookingController@get');
    Route::get('/cancel/{id}', 'Api\BookingController@cancel');
    Route::post('/', 'Api\BookingController@create');
});
