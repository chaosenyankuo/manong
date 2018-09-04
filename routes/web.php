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

//进入后台
Route::get('/admin','AdminController@index');

//后台用户管理
Route::resource('user','UserController');
//后台用户安全页面
Route::get('/user/{id}/anquan','UserController@anquan');
