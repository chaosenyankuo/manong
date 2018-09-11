<?php

namespace App\Http\Controllers;

use App\Link;
use App\Setting;
use App\Shop;
use App\Shopcar;
use App\User;
use Illuminate\Http\Request;

class ShopCarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $uid = \Session::get('id');
        $shopcar = Shopcar::where('user_id',$uid)->get();
        $shop_id = [];
        foreach ($shopcar as $v){
            $shop_id[] = $v['shop_id'];
        }   
        $shops = Shop::all();
        $links = Link::all();
        $setting = Setting::first();
        $user = User::find($uid);

        return view('home.shop.shopcar',['shop_id'=>$shop_id,'shops'=>$shops,'shopcar'=>$shopcar,'links'=>$links,'setting'=>$setting,'user'=>$user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $shopcar = new Shopcar;
        $shopcar->shop_id = $request->shop_id;
        $uid = \Session::get('id');
        $user = User::findOrFail($uid);
        $shopcar->user_id = $uid;
        $shopcar->address = $request->sheng.'-'.$request->shi.'-'.$request->xian;
        $shopcar->flavor_id = $request->flavor_id;
        $shopcar->pack_id = $request->pack_id;
        $shopcar->shuliang = $request->shuliang;
        if($uid == null){
            return back()->with('error','请先登录!!');
        }
        if(!$shopcar->flavor_id){
            return back()->with('error','请选择口味!!');
        }

        if(!$shopcar->pack_id){
            return back()->with('error','请选择包装!!');
        }
        
        if($shopcar->save()){
            return redirect('/shopcar')->with('success','添加购物车成功');
        }else{
            return back()->with('error','添加购物车失败');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shopcar = Shopcar::findOrFail($id);
        if($shopcar->delete()){
            return redirect('/shopcar')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }
}
