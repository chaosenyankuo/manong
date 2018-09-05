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

//后台登陆
	Route::get('/admin','AdminController@index');
//后台设置
	Route::get('/admin/setting', 'AdminController@setting');
	Route::post('/admin/setting', 'AdminController@update');
//物流管理
	//物流
	Route::resource('wuliu', 'WuliuController');
//支付管理
	//支付
	Route::resource('zhifu','ZhifuController');
//订单管理
	Route::resource('dingdan','DingdanController');
