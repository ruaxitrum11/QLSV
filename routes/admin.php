<?php
/**
 * Created by PhpStorm.
 * User: hieudt
 * Date: 10/16/18
 * Time: 11:43 AM
 */

Route::group(['middleware'=>'guest:admin'],function (){

    //====================Login========================
    Route::get('/','Admin\LoginController@show')->name('admin.login.show');
    Route::post('/','Admin\LoginController@post')->name('admin.login.post');
    //====================End Login================
});

Route::group(['middleware'=>'auth:admin'],function (){

    //====================Home========================
    Route::get('/logout','Admin\HomeController@logOut')->name('admin.LogOut');
    Route::get('/home','Admin\HomeController@show')->name('admin.home.show');
    Route::get('/user/{id}','Admin\UserController@show')->name('admin.user.show');

    //====================End Home================

    //====================User========================
    Route::get('/user/{id}','Admin\UserController@show')->name('admin.user.show');
    Route::put('/user/{id}','Admin\UserController@update')->name('admin.user.update');

    //====================End User================

    Route::get('/account','Admin\AccountController@showStudent')->name('admin.account.showStudent');


});