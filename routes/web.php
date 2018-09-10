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


//登陆页面
Route::get('/admin/login', 'AdminController@login');

//登陆操作
Route::post('/admin/login', 'AdminController@dologin');

//退出登录
Route::get('/admin/logout', 'AdminController@logout');


Route::group(['middleware'=>'login'],function(){
	//后台主页
	Route::get('/admin','AdminController@index');
		
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

	//商品口味管理
	Route::resource('flavor','FlavorController');

	//好中差管理
	Route::resource('com','ComController');

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

	//友情链接
	Route::resource('link','LinkController');
});



/*
	前台路由
 */
//前台登录
////前台注册
Route::get('/home/zhuce', 'ZhuceController@zhuce');

//注册操作
Route::post('/home/store', 'ZhuceController@store');

//前台登陆页面
Route::get('/home/login', 'HomeController@login');

//前台登陆操作
Route::post('/home/dologin', 'HomeController@dologin');


 
//前台注册
Route::get('/home/zhuce', 'ZhuceController@zhuce');

//注册操作
Route::post('/home/store', 'ZhuceController@store');

//前台登陆页面
Route::get('/home/login', 'HomeController@login');

//前台登陆操作
Route::post('/home/dologin', 'HomeController@dologin');

//个人中心
Route::get('/home/index','GrzxController@index');
//个人资料
Route::get('/home/grzl','GrzxController@grzl');
Route::post('/home/grzl','GrzxController@grzla');
//个人信息
Route::get('/home/grxx','GrzxController@grxx');
//修改个人信息
Route::post('/home/xggrxx','GrzxController@xggrxx');
//安全设置
Route::get('/home/aqsz','GrzxController@aqsz');
//修改密码
Route::get('/home/xgma','GrzxController@xgma');
Route::post('/home/xgmacz','GrzxController@xgmacz');
//评论管理
Route::get('/home/pjgl','GrzxController@pjgl');
//收货地址
Route::get('/home/shdz','GrzxController@shdz');
//添加收货地址

//前台末尾


//


//前台首页
Route::get('/','HomeController@index');

//前台商品详情
Route::get('/{id}.html','ShopController@show');



