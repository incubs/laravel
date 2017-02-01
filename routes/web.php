<?php


Route::get('/','UserController@index');
Route::post('users','UserController@store');
Route::get('users/create','UserController@create');

