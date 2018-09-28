<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    //
    public function weibo() {

        return Socialite::with('weibo')->redirect();
        // return \Socialite::with('weibo')->scopes(array('email'))->redirect();
    }
 
 
    public function callback() 
    {
        $oauthUser = \Socialite::with('weibo')->user();
        // dd($oauthUser);
        $id = json_decode($oauthUser->id);
        // dd($id);
 		// $user = new User;
 		
 		$user = DB::table('users') -> where('autoid','=',$id)->first();
		
 		// if (!empty($res)) {
 		// 	session(['username'=>$res->username, 'id'=>$res->id,'password'=>$res->password,'name'=>$res->name]);
 		// 	return redirect('/')->with('success','登录成功');
 		// }
 		if(empty($user)){
 			$user = new User;
 			$user -> autoid = $id;
 			$user -> uname = $oauthUser->nickname;
	 		$user -> nickname = $oauthUser ->nickname;
 			$user -> loginpwd = Hash::make($oauthUser->expiresIn);
 			$user -> image      = $oauthUser ->avatar;
 			$user -> huodong = '0';
 			$user ->  jifen = '10';
 			$user -> 	qx  = '2';
 			if($user -> save()){
	            session(['homeUser'=>$user]);
	 			return redirect('/')->with('success','登录成功');
 			}
 		}

 		if(!empty($user)){
 			session(['homeUser'=>$user]);
 			// dd(session('homeUser'));
	 		return redirect('/')->with('success','登录成功');
 		}	
    }
 
}