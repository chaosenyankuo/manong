<?php

namespace App\Http\Controllers;

use App\Link;
use App\Setting;
use App\User;
use App\uaddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class GrzxController extends Controller
{


	//个人中心
    public function index()
    {	$id = \Session::get('id');
    
    	$links = Link::all();
    	$user  = User::findOrFail($id);
    	$setting = Setting::first();

    	return view('home.grzx.index',compact('links','user','setting'));
    }

    public function grzl()
    {	
    	
    	$links = Link::all();
    	$setting = Setting::first();
    	
    	return view('home.grzx.grzl',compact('links','setting'));
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

    public function shdz()
    {	
    	$links = Link::all();
    	$setting = Setting::first();
    	$id = \Session::get('id');
		$users = User::find($id);	
    	return view('home.grzx.shdz',compact('links','setting','users'));
    }

    public function shdza(Request $request)
    {
    	$id = \Session::get('id');
		$users = User::find($id);			     
        $users -> uname = $request->uname;
        $users -> phone = $request->phone;
        $uadress = uaddress::find('id');
        $uadress -> xadress = $request->xadress;
        dd($uadress);
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
}
