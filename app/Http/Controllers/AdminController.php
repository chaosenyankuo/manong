<?php

namespace App\Http\Controllers;

use App\Setting;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\Concerns\session;


class AdminController extends Controller
{

	//后台登录
	public function login()
	{
		return view('admin.login');
	}

	public function dologin(Request $request)
	{	


		//获取用户的数据
		$user = User::where('nickname', $request->nickname)->first();
		
        if(!$user){
            return back()->with('error','登陆失败!');
        }

        //校验密码
        if(Hash::check($request->loginpwd, $user->loginpwd)){
            //写入session
            session(['nickname'=>$user->nickname,  'id'=>$user->id]);
            return redirect('/admin')->with('success','登陆成功');
        }else{
            return back()->with('error','登陆失败!');
        }

	}
	public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/admin/login')->with('success','退出成功');
    }
   /**
	* 后台首页
	*/
	public function index()
	{
		return view('admin');
	}


	/**
	 * 网站设置页面
	 */
	public function setting()
	{
		//读取表中的数据
		$setting = setting::first();

		return view('admin.setting', compact('setting'));
	}

	/**
	 * 网站设置
	 */
	public function update(Request $request)
	{
		$setting = setting::first();

		if(!$setting){
			$setting = new setting;
		}

		$setting -> title = $request->title;
		$setting -> keywords = $request->keywords;
		$setting -> description = $request->description;
		
		$setting -> banquan = $request->banquan;
		
		$setting -> domain = $request->domain;
		$setting -> logo = $request->input('logo', 'https://picsum.photos/400/300?image=2');

		if($setting->save()){
			return back()->with('success','设置成功');
		}else{
			return back()->with('error','设置失败!!');
		}
		
	}
    
}
