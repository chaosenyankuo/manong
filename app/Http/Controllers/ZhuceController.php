<?php

namespace App\Http\Controllers;

use App\Link;
use App\User;
use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ZhuceController extends Controller
{
    //
    public function zhuce()
    {	
    	$links = Link::all();
    	$setting = Setting::first();
    	return view('home.zhuce.zhuce',['links' => $links,'setting'=>$setting]);
    }

    public function store(Request $request)
    {
       	$user = new User; 
        if($request->password == null){
            return back()->with('error','请输入密码!!');
        }     
        $user -> loginpwd = Hash::make($request->password);
        $user -> email = $request->email;
        $user -> qx = $request->qx;

        if($user -> save()){
            session(['homeUser'=>$user]);
            return redirect('/home/grzl')->with('success', '注册成功');
        }else{
            return back()->with('error','注册失败');
        }        
    }
    //忘记密码
    public function wjma()
    {	$links = Link::all();
    	$setting = Setting::first();
    	return view('home.zhuce.wjma',['links' => $links,'setting'=>$setting]);
    }
}
