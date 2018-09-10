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
       
    	$users = new User; 
        if($request->password == null){
            return back()->with('error','请输入密码!!');
        }


      
        $users -> loginpwd = Hash::make($request->password);

        $users -> email = $request->email;
        
        

        if($users -> save()){

            session(['phone'=>$users->phone,  'email'=>$users->email ,'id' => $users->id]);

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
