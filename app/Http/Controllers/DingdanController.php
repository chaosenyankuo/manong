<?php

namespace App\Http\Controllers;

use App\Order;
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
        $dingdan -> shopcar_id = $request-> shopcar_id;
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
}
