<?php

namespace App\Http\Controllers;


use App\Link;
use App\Setting;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    
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
            session(['email'=>$user->email, 'nickname'=>$user->nickname, 'id'=>$user->id]);
            return redirect('/home/index')->with('success','登陆成功');
        }else{
            return back()->with('error','登陆失败!');
  
        }                   
	}
}	
