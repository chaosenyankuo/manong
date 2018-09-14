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

//后台路由
// Route::group(['middleware'=>'login'],function(){

	//后台主页
	Route::get('/admin','AdminController@index');
		
	//商品标签
	Route::resource('/ptag','PtagController');

	//商品评价
	Route::resource('comment','CommentController');

	//网站设置
	Route::get('/admin/setting', 'AdminController@setting');
	Route::post('/admin/setting', 'AdminController@update');

	//网站开关
	Route::resource('wzkg','Wzkgcontroller');
	//物流管理
	Route::resource('wuliu', 'WuliuController');

	//支付管理
	Route::resource('zhifu','ZhifuController');

	//订单管理
	Route::resource('dingdan','DingdanController');

	//收藏管理
	Route::resource('collect','CollectController');

	//商品管理
	Route::resource('shop','ShopController');

	//后台收藏管理
	Route::resource('collect','CollectController');

	//发送ajax请求查询对应的分类下的商品
	Route::post('/first','CollectController@first');

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

	//轮播图
	Route::resource('lunbotu','LunbotuController');

	//意见反馈列表
	Route::resource('/admin/yjfkui','YjfkuiController');



	//商城头条
	
	Route::resource('sctt','ScttController');
	

	//优惠券管理
	Route::resource('coupon','CouponController');

		
// });
/*
 *前台路由
 */
//前台首页
Route::get('/','HomeController@index');

//前台商品详情
Route::get('/{id}.html','ShopController@show');

//前台注册
Route::get('/home/zhuce', 'ZhuceController@zhuce');

//注册操作
Route::post('/home/store', 'ZhuceController@store');

//前台登陆页面
Route::get('/home/login', 'HomeController@login');

//前台登陆操作
Route::post('/home/dologin', 'HomeController@dologin');

//前台退出登录
Route::get('/home/logout','HomeController@logout');

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

//忘记密码
Route::get('/home/wjma', 'ZhuceController@wjma');

//忘记密码操作
Route::post('/home/wjmal', 'ZhuceController@wjmal');

//评论管理
Route::get('/home/pjgl','GrzxController@pjgl');

//评价商品
Route::get('/home/pjsp/{id}','GrzxController@pjsp');
Route::post('/home/plsp','GrzxController@plsp');

//足迹
Route::get('/home/foot','GrzxController@foot');

//收货地址
Route::get('/home/shdz','GrzxController@shdz');
Route::post('/home/shdz','GrzxController@shdza');

//修改收货地址
Route::get('/home/dzedit/{id}','GrzxController@dzedit');
Route::post('/home/dzupdate/{id}','GrzxController@dzupdate');

//删除收货地址
Route::get('/home/dzsc/{id}','GrzxController@dzsc');

//购物车管理
Route::resource('shopcar','ShopCarController');

//支付页面
Route::post('/dingdan/pay','DingdanController@pay');

//加入订单
Route::get('/home/dingdan/{id}','DingdanController@tianjia');

//订单保存
Route::post('/home/dingdan','DingdanController@baocun');

//订单列表
Route::get('/home/dingdan','DingdanController@list');

//意见反馈
Route::resource('/home/yjfk','YjfkController');

//前台收藏管理
Route::get('/home/cun','CollectController@cun');
Route::get('/home/collect','CollectController@zhanshi');
Route::get('/home/delete','CollectController@delete');

//福利中心
Route::get('/home/fuli','CouponController@fuli');

//发送ajax存优惠券
Route::post('/cunquan','CouponController@cunquan');

//前台我的优惠券页面
Route::get('/home/coupon','CouponController@zhanshi');

//发送ajax进行积分兑换优惠券
Route::post('/duihuan','CouponController@duihuan');



