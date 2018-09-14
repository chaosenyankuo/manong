<?php

namespace App\Http\Controllers;

use App\Coupon;
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
        return view('home.fuli.show');
    }

    public function cunquan()
    {
        $quan = $_POST['quan'];
        $coupon = Coupon::where('name',$quan)->get();
        $cid = $coupon[0]['id'];
        $uid = \Session::get('id');
        $user = User::findOrFail($uid);
        $res=$user->coupons()->sync($cid);
        if($res){
            echo '1';
        }else{
            echo '0';
        }
    }
}
