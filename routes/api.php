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

Route::group(['middleware' => ['auth-token']], function (){
    Route::get('users', 'ApiController@users');//same url ?????  $request for both???
    Route::get('users/{user}', 'ApiController@getUser');
    Route::post('users', 'ApiController@createUser');
    Route::post('users/{user}/update', 'ApiController@updateUser');
});
