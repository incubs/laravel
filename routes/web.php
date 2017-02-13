<?php


Route::group(['middleware' => 'auth'], function (){
    Route::get('users/list','UserController@listUsers')->name('users.list');
    Route::post('users/store','UserController@store')->name('users.store');
    Route::get('users/create','UserController@create')->name('users.create');
    Route::get('users/edit/{id}','UserController@edit')->name('users.edit');
    Route::post('users/update/{id}','UserController@update')->name('users.update');
    Route::get('logout', 'UserController@logout')->name('auth.logout');
});

Route::get('login', 'UserController@login')->name('auth.login');
Route::post('login', 'UserController@postLogin')->name('auth.postLogin');
