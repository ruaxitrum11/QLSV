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

    //====================Account========================

    Route::get('/accountS','Admin\AccountController@showStudent')->name('admin.account.showStudent');
    Route::get('/accountT','Admin\AccountController@showTeacher')->name('admin.account.showTeacher');
    Route::post('/account/add','Admin\AccountController@add')->name('admin.account.add');

    //=====================Client======================
    Route::get('/account/info_client/{id}','Admin\AccountController@infoClient')->name('admin.account.info_client');
    Route::get('/account/update_client/{id}','Admin\AccountController@showUpdateClient')->name('admin.account.show_update_client');
    Route::put('/account/update_client/{id}','Admin\AccountController@updateClient')->name('admin.account.update_client');
    Route::delete('/account/delete_client/{id}','Admin\AccountController@deleteClient')->name('admin.account.delete_client');
    //=====================End Client==================

    //=====================Admin======================
    Route::get('/account/info_admin/{id}','Admin\AccountController@infoAdmin')->name('admin.account.info_admin');
    Route::get('/account/update_admin/{id}','Admin\AccountController@showUpdateAdmin')->name('admin.account.show_update_admin');
    Route::put('/account/update_admin/{id}','Admin\AccountController@updateAdmin')->name('admin.account.update_admin');
    Route::delete('/account/delete_admin/{id}','Admin\AccountController@deleteAdmin')->name('admin.account.delete_admin');
    //=====================End Admin======================


    //====================End Account================

    //====================Score========================

    //=====================Admin======================
    Route::get('/score/info','Admin\ScoreController@info')->name('admin.score.info');
    Route::get('/score/info/{id}','Admin\ScoreController@showUpdate')->name('admin.score.showUpdate');
    Route::put('/score/info/{id}','Admin\ScoreController@update')->name('admin.score.update');


    //====================End Score========================


});