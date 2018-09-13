<?php

namespace App\Http\Controllers;

use App\Setting;
use App\User;

use Illuminate\Foundation\Testing\Concerns\session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;



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
		// dd($user);
        if(!$user){
            return back()->with('error','登陆失败!');
        }
        if($user['qx']==2){
        	 return back()->with('error','权限不足');
        }
        if($user['qx']==3){
        	 return back()->with('error','权限不足');
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
		$setting -> close = $request->close;
		if($request->hasFile('logo')){
            $setting->logo = '/'.$request->logo->store('uploads/'.date('Ymd'));
        }
		if($setting->save()){
			return back()->with('success','设置成功');
		}else{
			return back()->with('error','设置失败!!');
		}

		$path = 'E:/XAMPP/htdocs/manong/storage/framework/down';
        if(!is_file($path))
        {
            File::copy('E:/XAMPP/htdocs/manong/storage/framework/adown', 'E:/XAMPP/htdocs/manong/storage/framework/down');
            
            return redirect('/peizhi')->with('success','网站关闭成功!!!');
        }
            return back()->with('error','网站已经关闭,别点我了!!!');
            return view('admin.peizhi.index');
		
	}


	/**
	 * 退出登陆
	 */
	public function logout(Request $request)
	{
		$request->session()->flush();
		return redirect('/admin/login')->with('success','退出成功');
	}

}
