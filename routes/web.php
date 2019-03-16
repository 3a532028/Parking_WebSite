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

<<<<<<< HEAD
Route::get('/', function () {
    return view('test');
});

Route::get('/iswhite',['as'=>'iswhite',function (){
   return view ('iswhite');
}]);
=======
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

<<<<<<< HEAD
Route::get('/api','InfluxdbController@testdb');
=======
Route::get('/influxdb/api','InfluxdbController@index');
>>>>>>> 4d732e81bd370aae51208c4d11006e701f26aad3
>>>>>>> 99ad8cff71201516f300acad2df6f6a94f12f186
