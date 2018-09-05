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

//友情链接
Route::resource('link','LinkController');

//商品标签
Route::resource('/ptag','PtagController');

//商品评价
Route::resource('comment','CommentController');
