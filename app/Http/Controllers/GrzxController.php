<?php

namespace App\Http\Controllers;


use App\Collect;
use App\Comment;
use App\Link;
use App\Order;
use App\Order_shop;
use App\Setting;
use App\Shop;
use App\Uaddress;
use App\User;
use Illuminate\Foundation\Testing\Concerns\session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class GrzxController extends Controller
{
    //个人中心页面

    public function index()
    {	
        $id = \Session::get('id');
    	$links = Link::all();
        $setting = Setting::first();
    	$user  = User::findOrFail($id);
        $collects = Collect::where('user_id',$id)->get();
        $recoms = Shop::where('recom','1')->take(3)->get();

        $dfk = Order::where('zhuangtai','2')->where('user_id',\Session::get('id'))->get();
        $a = [];
        foreach($dfk as $k=>$v){
            $a[] = $v->order_shop; //待付款
        }
        $dfks = count($a);

        $dfh = Order::where('zhuangtai','3')->where('user_id',\Session::get('id'))->get();
        $a = [];
        foreach($dfh as $k=>$v){
            $a[] = $v->order_shop; //待发货
        }
        $dfhs = count($a);

        $dsh = Order::where('zhuangtai','4')->where('user_id',\Session::get('id'))->get();
        $a = [];
        foreach($dsh as $k=>$v){
            $a[] = $v->order_shop; //待收货
        }
        $dshs = count($a);

        $dpj = Order::where('zhuangtai','1')->where('user_id',\Session::get('id'))->get();
        $a = [];
        foreach($dpj as $k=>$v){
            $a[] = $v->order_shop; //待评价
        }
        $dpjs = count($a);

    	return view('home.grzx.index',compact('links','user','setting','collects','recoms','dsh','dfks','dfhs','dshs','dpjs'));
    }
    //个人资料页面
    public function grzl(request $request)
    {	
    	$links = Link::all();
        $setting = Setting::first();
    	$id = \Session::get('id');
		$user  = User::findOrFail($id);
    	return view('home.grzx.grzl',compact('links','user','setting'));
    }

    public function grzla(request $request)
    {       
    	$id = \Session::get('id');	
    	$users = User::find($id);
        $users -> nickname = $request->nickname;
        $users -> sex = $request->sex;
        $users -> uname = $request->uname;
        $users -> phone = $request->phone;
        //检测是否传文件
        if ($request->hasFile('image')) {
            $users -> image = '/'.$request->image->store('uploads/'.date('Ymd'));
        }else{
            $users -> image = '/uploads/1.jpg';
        } 
        if($users -> save()){
            $request->session()->flush();
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
    	$user = User::find($id);
    	return view('home.grzx.grxx',compact('user','links','setting'));
    }

    //修改个人信息
    public function xggrxx(Request $request)
    {

    	$id = \Session::get('id');
    	$user = User::findOrFail($id);

        $user -> nickname = $request -> nickname;
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
		$user  = User::findOrFail($id);
    	return view('home.grzx.aqsz',compact('links','user','setting'));
    }
    //修改密码
    public function xgma()
    {	
    	$links = Link::all();
        $setting = Setting::first();
        $user = User::findOrFail(session('id'));
    	return view('home.aqsz.xgma',['links'=>$links,'setting'=>$setting,'user'=>$user]);
    }

    public function xgmacz(Request $req)
    {
    	$user = User::findOrFail(session('id'));
        if (!Hash::check($req->jiupass,$user->loginpwd)){
            return back()->with('error','修改失败');
        }

        if(!$req->loginpwd == $req->loginpwds){
            return back()->with('error','两次新密码输入不相同');
        }

        $user -> loginpwd = Hash::make($req->loginpwd);

        if($user -> save()){
            return redirect('/home/login')->with('success','请重新登陆');
        }else{
            return back()->with('error','修改失败');

        }
        
    }

    //收货地址增加
    public function shdz()
    {	
        $uid = \Session::get('id');
    	$links = Link::all();
        $setting = Setting::first();
    	$uaddress = Uaddress::where('user_id',$uid)->get();        
        $user  = User::findOrFail($uid);
    	return view('home.grzx.shdz',compact('links','uaddress','setting','user'));
    }

    public function shdza(Request $request)
    {   
        $uid = \Session::get('id');
        $uaddresses = new Uaddress;
        $uaddresses -> user_id = $uid;
        $uaddresses -> name = $request -> name;
        $uaddresses -> uphone = $request -> uphone;       
        $uaddresses -> address = $request->sheng.'-'.$request->shi.'-'.$request->xian; //地址
        $uaddresses -> xadress = $request->xadress; //详细地址

        if($uaddresses -> save()){
            return redirect('/home/shdz')->with('success','添加地址成功');
        }else{
            return back()->with('error','添加地址失败');
        }
    }

    /**
     * 收货地址修改
     */
    public function dzedit($id)
    {
        $uid = \Session::get('id');
        $links = Link::all();
        $setting = Setting::first();
        $uaddress = Uaddress::where('user_id',$uid)->get();        
        $user  = User::findOrFail($uid);
        $uadd = Uaddress::findOrFail($id);
        $san = explode('-',$uadd->address);
        return view('home.grzx.shdzedit',compact('links','uaddress','setting','user','uadd','san'));
    }

    public function dzupdate(Request $req, $id)
    {
        $uaddress = Uaddress::findOrFail($id);

        $uid = \Session::get('id');

        $uaddress -> user_id = $uid;
        $uaddress -> name = $req -> name;
        $uaddress -> uphone = $req -> uphone;       
        $uaddress -> address = $req->sheng.'-'.$req->shi.'-'.$req->xian; //地址
        $uaddress -> xadress = $req->xadress; //详细地址

        if($uaddress -> save()){
            return redirect('/home/shdz')->with('success','修改地址成功');
        }else{
            return back()->with('error','修改地址失败');
        }
    }

    //删除收货地址 
    public function dzsc(Request $req, $id)
    {   

         $uaddress = Uaddress::findOrFail($id);
         // dd($uaddress);
        if($uaddress->delete()){
            return redirect('/home/shdz')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }

    }
//评价管理
    public function pjgl()
    {   
        $links = Link::all();
        $setting = Setting::first();
        $id = \Session::get('id');
        $user  = User::findOrFail($id);
        $comment = $user->comment;
        
        return view('home.grzx.pjgl',compact('links','setting','user','comment','pack'));

    }
//评价商品
    public function pjsp(Request $req, $id)
    {   
        $o_id = $req->order_id;
        $links = Link::all();
        $setting = Setting::first();
        $uid = \Session::get('id');
        $user  = User::findOrFail($uid);
        $shop = Shop::findOrFail($id);


        
        return view('home.grzx.pjsp',compact('links','setting','user','order','shop','o_id'));
    }

    public function plsp(Request $request,$id)
    {
        if(empty($request->com_id)){
            return back()->with('error','请选择您对本商品的评价');
        }
        //将值存入到数据库
        $comment = new Comment;
        $shop = Shop::findOrFail($id);
        $uid = \Session::get('id');
        $user  = User::findOrFail($uid);

        $comment -> user_id = $user['id'];
        $comment -> shop_id = $shop['id'];
        $comment -> com_id  = $request -> com_id;
        $comment -> content = $request -> content;
        $a = $comment ->save();

        if($a){
            $order = Order::find($request -> order_id);
            $os = Order_shop::where('order_id',$request->order_id)->where('shop_id',$id)->first();
            $os -> hascom = 1;
            if($os->save()){
                foreach($order->order_shop as $v){
                    $hascom[] = $v->hascom;
                }
                if(!in_array('0',$hascom)){
                    $order->zhuangtai = 5;
                    $order->save();
                }
            }
            return redirect('/home/pjgl')->with('success','恭喜您,评论成功');
        }else{
            return back()->with('error','抱歉,评论失败请重试!!');
        }
    }
}

