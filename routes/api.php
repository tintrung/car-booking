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

Route::get('/users', 'UserController@all');
Route::get('/users/{id}', 'UserController@get');

Route::group(['prefix' => 'bookings'], function() {
    Route::get('/', 'Api\BookingController@all');
    Route::get('/{id}', 'Api\BookingController@get');
    Route::get('/cancel/{id}', 'Api\BookingController@cancel');
    Route::post('/', 'Api\BookingController@create');
});
