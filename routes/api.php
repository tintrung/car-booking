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
    Route::get('/', 'BookingController@all');
    Route::get('/{id}', 'BookingController@get');
    Route::post('/', 'BookingController@create');
    Route::put('/cancel/{id}', 'BookingController@cancel');
});
