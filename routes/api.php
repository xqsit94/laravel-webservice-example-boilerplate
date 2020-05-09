<?php

use Illuminate\Support\Facades\Route;

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

Route::post('register', 'Api\AuthController@register');
Route::post('login', 'Api\AuthController@login');

//Events showed for both auth and guest
Route::get('events', 'Api\EventController@allEvents');

Route::middleware('auth:api')->group(function () {
    //Login
    Route::get('user', 'Api\AuthController@user');
    Route::post('logout', 'Api\AuthController@logout');

    //Event
    Route::get('user-events', 'Api\EventController@userEvents'); //Events which logged user created

    Route::get('events/{event}', 'Api\EventController@show');
    Route::post('events', 'Api\EventController@create');
    Route::put('events/{event}', 'Api\EventController@update');
    Route::delete('events/{event}', 'Api\EventController@delete');
});
