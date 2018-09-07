<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Link;
use App\Uaddress;
use App\User;
use App\Setting;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\Concerns\session;

class GrzxController extends Controller
{
    //个人中心页面
    public function index()
    {	$id = \Session::get('id');
    
    	$links = Link::all();
        $setting = Setting::first();
    	$user  = User::findOrFail($id);

    	return view('home.grzx.index',compact('links','user','setting'));
    }
    //个人资料页面
    public function grzl(request $request)
    {	
    	$links = Link::all();
        $setting = Setting::first();
    	$id = \Session::get('id');
		$users  = User::findOrFail($id);

    	return view('home.grzx.grzl',compact('links','users','setting'));
    }

    public function grzla(request $request)
    {

    	$id = \Session::get('id');
    	
    	$users = User::find($id);
    
        $users -> nickname = $request->nickname;
        $users -> uname = $request->uname;
        $users -> sex = $request->sex;
        $users -> email = $request->email;
        $users -> phone = $request->phone;

        //检测是否传文件
        if ($request->hasFile('image')) {
            $users -> image = '/'.$request->image->store('uploads/'.date('Ymd'));
        }else{
            $users -> image = '/uploads/1.jpg';
        } 

        if($users -> save()){
        	
            return redirect('/home/login')->with('success', '添加用户成功');
        }else{
            return back()->with('error','用户添加失败');
        }
    }
    //个人信息页面
    public function grxx()
    {	

    	$links = Link::all();
        $setting = Setting::first();
    	$id = \Session::get('id');
    	
    	$users = User::find($id);
    	return view('home.grzx.grxx',compact('users','links','setting'));
    }

    //修改个人信息
    public function xggrxx(Request $request)
    {

    	$id = \Session::get('id');
    	$user = User::findOrFail($id);

        $user -> nickname = $request -> nickname;
        $user -> uname = $request -> uname;
        
        $user -> sex = $request -> sex;
        

        if ($request->hasFile('image')) {
            $user -> image = '/'.$request->image->store('uploads/'.date('Ymd'));
        }

        if($user -> save()){
            return redirect('/home/grxx')->with('success','修改用户成功');
        }else{
            return back()->with('error','修改用户失败');
        }
    }
	//安全设置
    public function aqsz()
    {	
    	$links = Link::all();
        $setting = Setting::first();
    	$id = \Session::get('id');
		$users  = User::findOrFail($id);
    	return view('home.grzx.aqsz',compact('links','users','setting'));
    }
    //修改密码
    public function xgma()
    {	
    	$links = Link::all();
        $setting = Setting::first();
    	return view('home.aqsz.xgma',['links'=>$links,'setting'=>$setting]);
    }

    public function xgmacz(Request $req)
    {
    	$users = User::findOrFail(session('id'));
        if (!Hash::check($req->jiupass,$users->loginpwd)){
            return back()->with('error','修改失败');
        }

        if(!$req->loginpwd == $req->loginpwds){
            return back()->with('error','两次新密码输入不相同');
        }

        $users -> loginpwd = Hash::make($req->loginpwd);

        if($users -> save()){
            return redirect('/home/login')->with('success','请重新登陆');
        }else{
            return back()->with('error','修改失败');

        }
        
    }
    public function shdz()
    {	
    	$links = Link::all();
        $setting = Setting::first();
    	$uaddress = Uaddress::all();

    	return view('home.grzx.shdz',compact('links','uaddress','setting'));
    }

   
}