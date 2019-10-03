<?php

use Illuminate\Http\Request;



Route::group(['middleware' => 'auth:api'], function () { 
    Route::get('ShowDataId/{id}', 'API\ContentUserController@ShowDataId');
    Route::get('ShowContentID/{id}', 'API\ContentUserController@ShowContentID');
    Route::post('add', 'API\ContentUserController@add');
    Route::put('UpdateByContent/{id}', 'API\ContentUserController@UpdateByContent');
    Route::delete('DeleteByContent/{id}', 'API\ContentUserController@DeleteByContent');
    Route::get('DownloadGambar/{id}', 'API\ContentUserController@DownloadGambar');
});
 Route::post('login','API\UserController@login');
 Route::post('register','API\UserController@register');
 Route::get('details','API\UserController@details');
 Route::get('index','API\UserController@index');

