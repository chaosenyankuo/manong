<?php

namespace App\Http\Controllers;

use App\Shop;
use App\User;
use App\Zuji;
use Illuminate\Http\Request;

class ZujiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $zujis = Zuji::all();
        return view('admin.zuji.index',compact('zujis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $shops = Shop::all();
        return view('admin.zuji.create',compact('users','shops'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $uid = $request -> user_id;      
        $zuji = new Zuji;
        $zuji -> user_id = $request -> user_id;
        $zuji -> shop_id = $request -> shop_id;
        if($zuji -> save()){
            return redirect('/zuji')->with('success','添加成功');
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
        $zuji = Zuji::findOrFail($id);
        if($zuji->delete()){
            return redirect('/zuji')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }

    public function cunzuji()
    {
        $shop_id = $_POST['shop_id'];
        $user_id = \Session::get('id');
        $res = Zuji::where('user_id',$user_id)
            ->where('shop_id', $shop_id)
            ->first();
        if(!empty($res)){
            $time = date('Y-m-d H:i:s',time());
            $res -> updated_at = $time;
            if($res -> save()){
                echo '11';
            }else{
                echo '00';
            };
        }
        if(empty($res)){
            $zuji = new Zuji;
            $zuji -> user_id = $user_id;
            $zuji -> shop_id = $shop_id;
            if($zuji -> save()){
                echo '1';
            }else{
                echo '0';
            }
        }
    } 

    public function foot()
    {
        $uid = \Session::get('id');
        $zuji = Zuji::where('user_id',$uid)->get();
        return view('home.grzx.foot',compact('zuji'));
    }

    public function shanzuji()
    {
        $zuji_id = $_GET['zuji_id'];
        $zuji = Zuji::findOrFail($zuji_id);
        if($zuji->delete()){
            return back()->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }
}
