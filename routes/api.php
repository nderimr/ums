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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Lis all users 
Route::get('users','UsersController@index');
//display a single user
Route::get('user/{id}','UsersController@show');
//create new user
Route::post('user','UsersController@store');
//update user
Route::put('user','UsersController@store');
//Delete user
Route::delete('user/{id}','UsersController@destroy');
