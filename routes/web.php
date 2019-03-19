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
    return view('test');
});
// 黑白名單
Route::group(['prefix'=>'iswhite'],function (){
Route::get('/','AdminlpsController@index')->name('iswhite');
Route::get('/seletall','AdminlpsController@seletall');
Route::get('/{fun}','AdminlpsController@sort');
Route::get('/search/{Lps}','AdminlpsController@sort');
Route::get('/setting/{LP}','AdminlpsController@unban');
});



Route::get('/log_in', function () {
    return view('log_in',['body'=>'reportsPage','title'=>'log_in']);
})->name('log_in');


Route::get('/index',function (){
   return view('index',['body'=>'reportsPage','title'=>'index']);
})->name('index');

Route::get('/products',function (){
    return view('products',['body'=>'reportsPage','title' => 'products']);
})->name('products');

Route::get('/account',function (){
    return view('account',['body'=>'reportsPage','title' => 'account']);
})->name('account');

Route::get('/camera',function (){
    return view('camera',['body'=>'reportsPage','title' => 'camera']);
})->name('camera');

// allen route
Route::get('/api','InfluxdbController@testdb');
Route::get('/influxdb/api','InfluxdbController@index');

Route::get('/dashboard','IndexController@index');
