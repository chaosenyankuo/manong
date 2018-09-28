<?php

namespace App\Http\Controllers;

use App\Cate;
use App\Link;
use App\Lunbotu;
use App\Sctt;
use App\Setting;
use App\Shop;
use App\Shopcar;
use App\Tag;
use App\User;
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

 // dd($request->loginpwd);
    if($request->loginpwd == null)
        {
            return back()->with('error','登陆失败!');
        }
		//获取用户的数据
		$user = User::where('email', $request->email)->first();
		

        if(!$user){
            return back()->with('error','登陆失败!');
        }
        

        //校验密码
        if(Hash::check($request->loginpwd, $user->loginpwd)){
            //写入session
            session(['homeUser' => $user]);
            return redirect('/home/index')->with('success','登陆成功');
        }else{
            return back()->with('error','登陆失败!');
  


   		}          

	}

    public function logout(Request $request)
    {   
        $request->session('homeUser')->flush();
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
        $rec = Shop::where('recom','1')->get();
    	$recom = Shop::where('recom','1')->take(3)->orderBy('id','desc')->get();
        $shops = Shop::all();  
    	$id = \Session::get('homeUser')['id'];     
        $user = User::find($id);

    	$a = 1;
    	$cid = Cate::pluck('id');
        
        $lunbotu = Lunbotu::all()->take(4);
        $sctt = Sctt::all()->take(4);
        $setting = Setting::first();

    	return view('home',compact('cates','tags','links','recom','shops','a','cid','user','lunbotu','sctt','setting','rec'));
    }

    //前台搜索
    public function soso()
    {
        $soso = $_GET['keywords'];
        
        $id = \Session::get('homeUser')['id'];     
        $user = User::find($id);
        $setting = Setting::first();
        $links = Link::all();
        $shops = Shop::orderBy('id','desc')
            ->where('sname','like','%'.request()->keywords.'%')->get();
       
        return view('/home.soso.index',compact('user','setting','links','shops'));
       
    }

    //前台标签下商品
    public function tags($id)
    {
        $tags = Tag::findOrFail($id);
        $id = \Session::get('homeUser')['id'];     
        $user = User::find($id);
        $setting = Setting::first();
        $links = Link::all();
        $shops = $tags->shops()->get();
       return view('/home.tags.index',compact('user','setting','links','shops'));
    }

    /**
     * 前台分类下商品
     */
    public function cates($id)
    {
        $tags = Cate::findOrFail($id);
        $id = \Session::get('homeUser')['id'];     
        $user = User::find($id);
        $setting = Setting::first();
        $links = Link::all();
        $shops = $tags->shops()->get();
        return view('/home.tags.index',compact('user','setting','links','shops'));
    }

}

