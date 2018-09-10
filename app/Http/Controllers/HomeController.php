<?php

namespace App\Http\Controllers;

use App\Link;
use App\User;
use App\Setting;
use App\Cate;
use App\Shop;
use App\Tag;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{

    //前台登录

	public function login()
	{	
		 //读取网站设置
        $setting = Setting::first();
        //读取友情链接 
        $links = Link::all();
        // dd($links);
		return view('home.denglu.login',['setting'=>$setting,'links'=>$links]);
	}

	public function dologin(Request $request)
	{	


		//获取用户的数据
		$user = User::where('email', $request->email)->first();
		

        if(!$user){
            return back()->with('error','登陆失败!');
        }

        //校验密码
        if(Hash::check($request->loginpwd, $user->loginpwd)){
            //写入session
            session(['email'=>$user->email, 'image'=>$user->image, 'nickname'=>$user->nickname, 'id'=>$user->id]);
            return redirect('/home/index')->with('success','登陆成功');
        }else{
            return back()->with('error','登陆失败!');
  


   		}          

	}

    public function logout(Request $request)
    {   
        $request->session()->flush();
        return redirect('/home/login')->with('success','退出成功');
    }

    /**
     * 前台首页
     */
    public function index()
    {	
    	$cates = Cate::all();
    	$tags = Tag::all();
    	$links = Link::all();
    	$recom = Shop::where('recom','1')->take(3)->orderBy('id','desc')->get();
        $shops = Shop::all();
    	$id = \Session::get('id');
        
        $user = User::find($id);
        // dd($user);
    	$a = 1;
    	$cid = Cate::pluck('id');

    	return view('home',compact('cates','tags','links','recom','shops','a','cid','user'));
    }


}

