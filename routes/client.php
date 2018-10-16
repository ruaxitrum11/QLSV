<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::group(['middleware'=>'guest:client'],function (){
    //====================Register====================
    Route::get('/register','Client\RegisterController@getRegister')->name('client.getRegister');
    Route::post('/register','Client\RegisterController@postRegister')->name('client.postRegister');
    //====================End Register================

    //====================Login========================
    Route::get('/login','Client\LoginController@getLogin')->name('client.getLogin');
    Route::post('/login','Client\LoginController@postLogin')->name('client.postLogin');
});
    //====================End Login====================


Route::group(['middleware'=>'auth:client'],function(){
    //====================Home====================
    Route::get('/logout','Client\HomeController@logOut')->name('client.LogOut');
    Route::get('/home','Client\HomeController@getHome')->name('client.getHome');
    //====================End Home================

    //==================== User====================
    Route::get('/user/{id}','Client\UserController@show')->name('user.show');
    Route::put('/user/{id}','Client\UserController@update')->name('user.update');
    //====================End  User================
});



