<?php

namespace App\Http\Controllers;

use App\Link;
use App\Order;
use App\Setting;
use App\Shop;
use App\Shopcar;
use App\Uaddress;
use App\User;
use App\Wuliu;
use App\Zhifu;
use Illuminate\Http\Request;

class DingdanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $zhifu =zhifu::all();
        $wuliu = wuliu::all();

          //读取数据库 获取订单数据
        $dingdan = order::orderBy('id','desc')
                ->paginate(4);
            
            
        //解析模板显示用户数据
        return view('admin.dingdan.index', ['dingdan'=>$dingdan,'zhifu'=>$zhifu,'wuliu'=>$wuliu]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {       
         //读取支付信息
        $zhifu = zhifu::all();
      
        $wuliu = wuliu::all();

        //读取物流信息
        // $wuliu =wuliu::all();
          return view('admin.dingdan.create',['zhifu'=>$zhifu,'wuliu'=>$wuliu,]);
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
        $shopcar = Shopcar::where('user_id',$id)->get();
        $uaddress = Uaddress::where('user_id',$id)->get();
        $shuliang = $req->shuliang;
        $shop_id = $req->shop_id;
        $wuliu = Wuliu::all();
        $zhifu = Zhifu::all();
        $links = Link::all();
        $shops = Shop::all();

        return view('home/dingdan/create',compact('id','shopcar','shop_id','shops','shuliang','uaddress','uadd','wuliu','zhifu','links'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $dingdan =order::findOrFail($id);

        $wuliu = wuliu::all();

        $zhifu = zhifu::all();

        return view('admin.dingdan.edit', compact('dingdan','zhifu','wuliu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { //获取订单详情

        $dingdan = order::findOrFail($id);

        //更新

        $dingdan -> wuliu_id = $request-> wuliu_id;
        $dingdan -> shop_id = $request-> shop_id;
        $dingdan -> uaddress_id = $request-> uaddress_id;
        $dingdan -> order_bh = $request-> order_bh;
        $dingdan -> user_id = $request-> user_id;
        $dingdan -> zhifu_id = $request-> zhifu_id;

        if($dingdan->save()){
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
          $dingdan = order::findOrFail($id);

        if($dingdan->delete()){
            return back()->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }

    /**
     * 前台保存订单
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
        foreach($req-> shop_id as $k=>$v){
            $dd = new Order;

            $dd -> zhuangtai = 1;
            $dd -> wuliu_id = $req -> wuliu_id;
            $dd -> shop_id = $v; //数组
            $dd -> uaddress_id = $req -> uaddress_id;
            $dd -> order_bh = $order_bh;
            $dd -> user_id = \Session::get('id');
            $dd -> zhifu_id = $req -> zhifu_id;
            $dd -> shuliang = ($req -> shuliang)[$k];

            $a = $dd->save();

            $shopcar = Shopcar::where('user_id',\Session::get('id'))->where('shop_id',$v)->delete();

        }

        if($a && $shopcar){
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
        //交易成功和待评价
        $order1 = Order::where('zhuangtai','1')->where('user_id',\Session::get('id'))->get();
        //代付款
        $order2 = Order::where('zhuangtai','2')->where('user_id',\Session::get('id'))->get();
        //代发货
        $order3 = Order::where('zhuangtai','3')->where('user_id',\Session::get('id'))->get();
        //待收货
        $order4 = Order::where('zhuangtai','4')->where('user_id',\Session::get('id'))->get();

        $links = Link::all();
        $setting = Setting::first();
        return view('home/grzx/order',compact('order1','order2','order3','order4','links','setting'));
    }
}

