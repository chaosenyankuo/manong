<?php

namespace App\Http\Controllers;

use App\Link;
use App\User;
use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

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

    //忘记密码操作
    public function send(Request $req)
    {


        $links = Link::all();
        $setting = Setting::first();
        
        return view('home.zhuce.youxiang',['links' => $links,'setting'=>$setting]);
    }

    public function sendl()
    {
        echo Json_encode(session('emailCode'));
    }


    public function sendemail()
    {
        // if(\Session::has('emailCode')){
        //     session(['emailCode'=>null]);
        // }
        // dd(111);
        $code = rand(1000,9999);
        // var_dump($code);
        session(['emailCode'=>$code]);
        // dd(session('emailCode'));
        Mail::send('emails.send', ['code'=>$code], function ($message) {
            $zhi =  $_POST['val'];
            $zhii = $zhi.'m';
            $xzhi = Mb_substr($zhii,0,-1,'UTF-8');
           // dd($xzhi);
            $message->subject('验证码');
            //接收者
            $message->to($xzhi);


        });
    }

    public function wjmima(Request $req)
    {
        $links = Link::all();
        $setting = Setting::first();
        $user = User::where('email',$req->email)->first();
        $user -> loginpwd = hash::make($req -> password);
        $user -> save();

        return view('home.denglu.login',compact('links','setting'));
    }
}
