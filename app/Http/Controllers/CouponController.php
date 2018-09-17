<?php

namespace App\Http\Controllers;

use App\Coupon;
use App\Coupon_user;
use App\User;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons = Coupon::orderBy('id','desc')
            ->where('name','like','%'.request()->keywords.'%')
            ->paginate(5);
        return view('admin.coupon.index',compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.coupon.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $coupon = new Coupon;
        $coupon -> name = $request -> name;
        $coupon -> price = $request -> price;
        if($coupon->save()){
            return redirect('/coupon')->with('success','添加成功');
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
        $coupon = Coupon::findOrFail($id);
        return view('admin.coupon.edit',compact('coupon'));
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
        $coupon = Coupon::findOrFail($id);
        $coupon -> name = $request -> name;
        $coupon -> price = $request -> price;
        if($coupon->save()){
            return redirect('/coupon')->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
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
        $coupon = Coupon::findOrFail($id);
        if($coupon->delete()){
            return redirect('/coupon')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }

    public function fuli()
    {
        $coupons = Coupon::all();
        return view('home.fuli.show',compact('coupons'));
    }

    public function cunquan()
    {
        $quan = $_POST['quan'];
        $coupon = Coupon::where('name',$quan)->get();
        $cid = $coupon[0]['id'];
        $uid = \Session::get('id');
        $user = User::findOrFail($uid);
        $user -> huodong = '1';
        $lingqu = date('Y-m-d H:i:s',time());
        $daoqi = date('Y-m-d H:i:s',strtotime('+2 day'));
        $coupon_user = new Coupon_user;
        $coupon_user -> user_id = $uid;
        $coupon_user -> coupon_id = $cid;
        $coupon_user -> lingqu = $lingqu;
        $coupon_user -> daoqi = $daoqi;
        if($user -> save() && $coupon_user -> save()){
            echo '1';
        }else{
            echo '0';
        }
    }

    public function zhanshi()
    {
        $uid = \Session::get('id');
        $user = User::findOrFail($uid);
        $coupons = $user -> coupon_user;
        return view('home.fuli.coupon',compact('coupons','user'));
    }

    public function duihuan()
    {
        //获取优惠券金额
        $price = $_POST['price'];
        //按照积分:优惠券金额  10:1的比例进行兑换
        $newprice = $price * 10;
        //获取当前登录人的积分
        $jifen = $_POST['jifen'];
        //获取优惠券的id
        $coupon = Coupon::where('price',$price)->first();
        $cid = $coupon['id'];
        //改变当前登录人的积分
        $uid = \Session::get('id');
        $user = User::findOrFail($uid);
        //如果当前登录人的积分小于优惠券金额 则兑换失败
        if($jifen < $newprice){
            $user -> jifen = $jifen;
            echo '0';
        }
        if($jifen >= $newprice){
            $user -> jifen = $jifen - $newprice;
            $lingqu = date('Y-m-d H:i:s',time());
            $daoqi = date('Y-m-d H:i:s',strtotime('+2 day'));
            $coupon_user = new Coupon_user;
            $coupon_user -> user_id = $uid;
            $coupon_user -> coupon_id = $cid;
            $coupon_user -> lingqu = $lingqu;
            $coupon_user -> daoqi = $daoqi;
            if($user -> save() && $coupon_user -> save()){
                echo '1';
            }else{
                echo '0';
            }
        }else{
            echo '0';
        }

    }
}
