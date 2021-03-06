<?php

namespace App\Http\Controllers;

use App\Coupon;
use App\Coupon_user;
use App\Link;
use App\Order;
use App\Order_shop;
use App\Setting;
use App\Shop;
use App\Shopcar;
use App\Uaddress;
use App\User;
use App\Wuliu;
use App\Zhifu;
use App\Zhuangtai;
use Illuminate\Http\Request;

class DingdanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        // dd(111);
        //读取数据库 获取订单数据
        $os = Order_shop::orderBy('id','desc')
                ->where('order_bh','like', '%'.request()->keywords.'%')
                ->paginate(5);
        // dd($os);
        //解析模板显示用户数据
        return view('admin.dingdan.index', compact('os'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {      
        $uid = \Session::get('adminUser')['id'];
        $user = User::findOrFail($uid); 
         //读取支付信息
        $zhifu = zhifu::all();
      
        $wuliu = wuliu::all();

        //读取物流信息
        // $wuliu =wuliu::all();
          return view('admin.dingdan.create',['zhifu'=>$zhifu,'wuliu'=>$wuliu,'user'=>$user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dingdan = new order;
        // dd($request-> shop_id);
        $dingdan -> wuliu_id = $request-> wuliu_id;
        $dingdan -> shop_id = $request-> shop_id;
        $dingdan -> uaddress_id = $request-> uaddress_id;
        $dingdan -> order_bh = $request-> order_bh;
        $dingdan -> user_id = $request-> user_id;
        $dingdan -> shopcar_id = $request-> shopcar_id;
        $dingdan -> zhifu_id = $request-> zhifu_id;
       

        if($dingdan -> save()){
            return redirect('/dingdan')->with('success', '添加成功');
        }else{
            return back()->with('error','添加失败');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $req, $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $os = Order_shop::findOrFail($id);
        $flavor = $os->shop->flavors()->get();
        $pack = $os->shop->packs()->get();
        $dingdan =order::findOrFail($id);
        $uid = \Session::get('adminUser')['id'];
        $user = User::findOrFail($uid);
        $wuliu = wuliu::all();
        $zhifu = zhifu::all();
        $uaddress = Uaddress::where('user_id',$dingdan->user_id)->get();

        return view('admin.dingdan.edit', compact('os','zhifu','wuliu','flavor','pack','uaddress'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    { //获取订单详情

        $os = Order_shop::findOrFail($id);
        $order = Order::findOrFail($os->order_id);

        //更新
        $order -> wuliu_id = $req -> wuliu_id;
        $order -> zhifu_id = $req -> zhifu_id;
        $order -> uaddress_id = $req -> uaddress_id;
        $os -> flavor_id = $req -> flavor_id;
        $os -> pack_id = $req -> pack_id;
        $os -> shuliang = $req -> shuliang;

        if($os->save() && $order->save()){
            return redirect('/dingdan')->with('success','更新成功');
        }else{
            return back()->with('error','更新失败');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);

        $os = $order->order_shop()->get();

        foreach($os as $v){
            $v->delete();
        }

        if($order->delete()){
            return redirect('/dingdan')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }

    /**
     * 前台订单添加
     */
    public function tianjia(Request $req, $id)
    {
        $shopcar = Shopcar::where('user_id',$id)->get();
        $uaddress = Uaddress::where('user_id',$id)->get();
        $shuliang = $req->shuliang;
        $shop_id = $req->shop_id;
        $wuliu = Wuliu::all();
        $zhifu = Zhifu::all();
        $links = Link::all();
        $shops = Shop::all();
        $uid = \Session::get('homeUser')['id'];
        $user = User::find($uid);
        $setting = Setting::first();
        $yhj = Coupon_user::where('user_id',$uid)->get();
        return view('home/dingdan/create',compact('id','shopcar','shop_id','shops','shuliang','uaddress','uadd','wuliu','zhifu','links','user','setting','yhj'));
    }


    /**
     * 前台保存未支付订单
     */
    public function baocun(Request $req)
    {   
        if(!$req->wuliu_id){
            return back()->with('error','请选择配送方式');
        }

        if(!$req->zhifu_id){
            return back()->with('error','请选择支付方式');
        }

        if(!$req->uaddress_id){
            return back()->with('error','请选择收货地址');
        }
        $order_bh = rand(100,999);

        $dd = new Order;
        $dd -> zhuangtai_id = 2;
        $dd -> wuliu_id = $req -> wuliu_id;
        $dd -> uaddress_id = $req -> uaddress_id;
        $dd -> order_bh = $order_bh;
        $dd -> user_id = \Session::get('homeUser')['id'];
        $dd -> zhifu_id = $req -> zhifu_id;
        $dd -> cjj = $req -> zongjia;
        
        $a = $dd->save();

        foreach($req-> shop_id as $k=>$v){
            $ddd = Order::where('user_id',\Session::get('homeUser')['id'])->where('order_bh',$order_bh)->get();
            $os = new Order_shop;
            $os -> order_id = $ddd[0]->id;
            $os -> shop_id = $v;
            $os -> shuliang = ($req -> shuliang)[$k];
            $os -> order_bh = $order_bh;
            $os -> flavor_id = ($req -> flavor_id)[$k];
            $os -> pack_id = ($req -> pack_id)[$k];

            $os -> save();
        }

        $shopcar = Shopcar::where('user_id',\Session::get('homeUser')['id'])->where('shop_id',$v)->delete();

        if($a && $os && $shopcar){
            return redirect('/home/dingdan')->with('success','生成订单成功');
        }else{
            return back()->with('error','生成订单失败');
        }
    }

    /**
     * 前台订单列表
     */
    public function list()
    {   
        //待评价
        $order1 = Order::where('zhuangtai_id','1')->where('user_id',\Session::get('homeUser')['id'])->get();
        //代付款
        $order2 = Order::where('zhuangtai_id','2')->where('user_id',\Session::get('homeUser')['id'])->get();
        //代发货
        $order3 = Order::where('zhuangtai_id','3')->where('user_id',\Session::get('homeUser')['id'])->get();
        //待收货
        $order4 = Order::where('zhuangtai_id','4')->where('user_id',\Session::get('homeUser')['id'])->get();
        //交易成功
        $order5 = Order::where('zhuangtai_id','5')->where('user_id',\Session::get('homeUser')['id'])->get();

        if(!empty($order1[0])){
            foreach($order1 as $k=>$v){
                $os1[] = Order_shop::where('order_id',$v->id)->get();
            }
        }else{
            $os1 = [];
        }
        if(!empty($order2[0])){
            foreach($order2 as $k=>$v){
                $os2[] = Order_shop::where('order_id',$v->id)->get();
            }
        }else{
            $os2 = [];
        }
        if(!empty($order3[0])){
            foreach($order3 as $k=>$v){
                $os3[] = Order_shop::where('order_id',$v->id)->get();
            }
        }else{
            $os3 = [];
        }
        if(!empty($order4[0])){
            foreach($order4 as $k=>$v){
                $os4[] = Order_shop::where('order_id',$v->id)->get();
            }
        }else{
            $os4 = [];
        }
        if(!empty($order5[0])){
            foreach($order5 as $k=>$v){
                $os5[] = Order_shop::where('order_id',$v->id)->get();
            }
        }else{
            $os5 = [];
        }

        $uid = \Session::get('homeUser')['id'];
        $user = User::find($uid);

        $links = Link::all();
        $setting = Setting::first();

        return view('home/grzx/order',compact('order1','order2','order3','order4','order5','os1','os2','os3','os4','os5','user','links','setting'));
    }

    /**
     * 支付页面
     */
    public function pay(Request $req)
    {
        if(!$req->wl_id){
            return back()->with('error','请选择配送方式');
        }

        if(!$req->zf_id){
            return back()->with('error','请选择支付方式');
        }

        if(!$req->uadd_id){
            return back()->with('error','请选择收货地址');
        }
        $order_bh = rand(100,999);


        if($req->yhj_1){
            $coupon = Coupon::where('price',$req->yhj_1)->first();
            $cu = Coupon_user::where('coupon_id',$coupon->id)->where('user_id',\Session::get('homeUser')['id'])->first();
            $cu->delete();
        }

        $dd = new Order;
        $dd -> zhuangtai_id = 3;
        $dd -> wuliu_id = $req -> wl_id;
        $dd -> uaddress_id = $req -> uadd_id;
        $dd -> order_bh = $order_bh;
        $dd -> user_id = \Session::get('homeUser')['id'];
        $dd -> zhifu_id = $req -> zf_id;
        $dd -> liuyan = $req -> liuyan;
        $dd -> cjj = $req -> zongjia;

        $a = $dd->save();

        foreach($req-> shop_id as $k=>$v){
            $ddd = Order::where('user_id',\Session::get('homeUser')['id'])->where('order_bh',$order_bh)->take(1)->get();
            $os = new Order_shop;
            $os -> order_id = $ddd[0]->id;
            $os -> shop_id = $v;
            $os -> shuliang = ($req -> shuliang)[$k];
            $os -> order_bh = $order_bh;
            $os -> flavor_id = ($req -> flavor_id)[$k];
            $os -> pack_id = ($req -> pack_id)[$k];
            $b = $os -> save();
            $shopcar = Shopcar::where('user_id',\Session::get('homeUser')['id'])->where('shop_id',$v)->delete();
            //销量
            $shop = Shop::findOrFail($v);
            $shop -> csales = $shop->csales + $os->shuliang; //总销量
            $shop -> scount = $shop->scount - $os->shuliang; //库存
            $shop -> msales = $shop->msales + $os->shuliang; //月销量
            $shop ->save();
        }

        if($a && $os && $shopcar){

            $user = User::findOrFail(\Session::get('homeUser')['id']);
            $jifen = $user->jifen;
            $user->jifen = $jifen + $req->jifen;
            $user->save();

            $setting = Setting::first();
            $links = Link::all();
            $order = Order::where('user_id',\Session::get('homeUser')['id'])->where('order_bh',$order_bh)->get();
            $uadd = $order[0]->uaddress;
            $address = explode('-', $uadd->address);
            $xiangxi = $uadd -> xadress;
            $zongjia = $req -> zongjia;
            $uname = $uadd -> name;
            $phone = $uadd -> uphone;

            return view('home/dingdan/pay',compact('user','setting','links','address','zongjia','uname','phone','xiangxi'));
        }else{
            return back()->with('error','生成订单失败');
        }
    }

    /**
     * 前台订单删除
     */
    public function del($id)
    {
        $order = Order::findOrFail($id);
        $os = $order->Order_shop;
        foreach($os as $v){
            $a = $v->delete();
        }
        $b = $order ->delete();
        if($a && $b){
            return back()->with('success','删除订单成功');
        }else{
            return back()->with('error','删除订单失败');
        }
    }

    /**
     * 前台订单点击支付
     */
    public function pays(Request $req,$id)
    {
        $os = Order_shop::where('order_id',$id)->get();
        foreach ($os as $v){
            $sprice[] = $v->shop->sprice;
            $shuliang[] = $v->shuliang;
            $shop_id[] = $v->shop_id;
        }

        //销量
        foreach($shop_id as $k=>$v){
            $shop = Shop::findOrFail($v); 
            $shop -> csales = $shop->csales + $shuliang[$k]; //总销量
            $shop -> scount = $shop->scount - $shuliang[$k]; //库存
            $shop -> msales = $shop->msales - $shuliang[$k]; //月销量
            $shop ->save();
        }

        $order = Order::findOrFail($id);
        $zongjia = $order -> cjj;
        $uadd = $order->uaddress->address;
        $address = explode('-', $uadd);
        $xiangxi = $order->uaddress->xadress;
        $uname = $order->uaddress->name;
        $phone = $order->uaddress->uphone;
        $user = User::findOrFail(\Session::get('homeUser')['id']);
        $links = Link::all();
        $setting = Setting::first();

        $order -> zhuangtai_id = 3;

        if($req->jifen){
            $user = User::findOrFail(\Session::get('homeUser')['id']);
            $jifen = $user->jifen;
            $user->jifen = $jifen + $req->jifen;
            $user->save();
        }
        if($order->save()){
            return view('home/dingdan/pay',compact('address','xiangxi','zongjia','uname','phone','user','links','setting'));
        }else{
            return back()->with('error','支付失败');
        }
    }

    /**
     * 前台点击发货
     */
    public function fahuo($id)
    {
        $order = Order::findOrFail($id);

        $order -> zhuangtai_id = 4;

        if($order->save()){
            return back()->with('success','提醒发货成功');
        }else{
            return back()->with('error','提醒发货失败');
        }
    }

    /**
     * 前台点击收货
     */
    public function shouhuo($id)
    {
        $order = Order::findOrFail($id);

        $order -> zhuangtai_id = 1;

        if($order->save()){
            return back()->with('success','确认收货成功');
        }else{
            return back()->with('error','确认收货失败');
        }
    }
}

