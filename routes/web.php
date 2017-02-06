<?php


Route::group(['middleware' => 'auth'], function (){
    Route::get('/','UserController@index')->name('users.list');
    Route::post('users','UserController@store')->name('users.store');
    Route::get('users/create','UserController@create')->name('users.create');
    Route::get('users/{id}/edit','UserController@edit')->name('users.edit');
    Route::post('users/{id}','UserController@update')->name('users.update');
    Route::get('logout', 'UserController@logout')->name('auth.logout');
});

Route::get('login', 'UserController@login')->name('auth.login');
Route::post('login', 'UserController@postLogin')->name('auth.postLogin');
