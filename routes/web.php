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

// 黑白名單
Route::group(['prefix'=>'iswhite','middleware' => 'auth'],function (){
    Route::get('/','AdminlpsController@index')->name('iswhite');
    Route::get('/seletall','AdminlpsController@seletall');
    Route::get('/{fun}','AdminlpsController@sort');
    Route::get('/search/{Lps}','AdminlpsController@sort');
    Route::get('/setting/{LP}','AdminlpsController@unban');
});

Route::get('/',function (){
   return redirect('/dashboard');
})->name('index');

// allen route
//Route::get('/api','InfluxdbController@testdb');
//Route::get('/influxdb/api','InfluxdbController@index');
//Route::get('/test','UserController@test');

Route::group(['middleware' => 'auth'],function (){
    Route::get('/dashboard','IndexController@index')->name('dashboard');
    Route::get('/camera','CameraController@callapi')->name('camera');
    Route::get('/log_out','UserController@logout')->name('logout');

    Route::get('/account','UserController@account_index')->name('account');
    Route::post('/account','UserController@insert');
});

// login
Route::get('/log_in','UserController@login_index')->name('login');
Route::post('/log_in','UserController@login');
