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


//登陆页面
Route::get('/admin/login', 'AdminController@login');

//登陆操作
Route::post('/admin/login', 'AdminController@dologin');



//后台路由
Route::group(['middleware'=>'login'],function(){

//后台登陆
Route::get('/admin','AdminController@index');

//退出登录
Route::get('/admin/logout', 'AdminController@logout');

//友情链接
Route::resource('link','LinkController');

//商品标签
Route::resource('/ptag','PtagController');

//商品评价
Route::resource('comment','CommentController');

//网站设置
Route::get('/admin/setting', 'AdminController@setting');
Route::post('/admin/setting', 'AdminController@update');

//物流管理
Route::resource('wuliu', 'WuliuController');

//支付管理
Route::resource('zhifu','ZhifuController');

//订单管理
Route::resource('dingdan','DingdanController');

//商品管理
Route::resource('shop','ShopController');

//分类管理
Route::resource('cate','CateController');

//包装管理
Route::resource('pack','PackController');

//标签管理
Route::resource('tag','TagController');

//用户管理
Route::resource('user','UserController');


//地址管理
Route::resource('uaddress','UaddressController');

