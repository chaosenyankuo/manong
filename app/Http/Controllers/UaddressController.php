<?php

namespace App\Http\Controllers;

use App\Uaddress;
use App\User;
use Illuminate\Http\Request;

class UaddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $uaddress = Uaddress::orderBy('id','desc')
            ->where('xadress','like', '%'.request()->keywords.'%')
            ->paginate(10);
        return view('admin/uaddress/index',['uaddress'=>$uaddress]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $users = User::all();
        return view('admin/uaddress/create',['users'=>$users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        //
        $uaddress = new Uaddress;

        $uaddress -> user_id = $req->user_id;
        $uaddress -> name = $req->name;
        $uaddress -> uphone = $req->uphone;
        $uaddress -> address = $req->sheng.'-'.$req->shi.'-'.$req->xian; //地址
        $uaddress -> xadress = $req->xadress; //详细地址

        if($uaddress -> save()){
            return redirect('/uaddress')->with('success','添加地址成功');
        }else{
            return back()->with('error','添加地址失败');
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
        $uaddress = Uaddress::findOrFail($id);
        $uadd = explode('-',$uaddress->address);
        $users = User::all();
        return view('admin/uaddress/edit',['uaddress'=>$uaddress,'users'=>$users,'uadd'=>$uadd]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        //
        $uaddress = Uaddress::findOrFail($id);

        $uaddress -> user_id = $req->user_id;
        $uaddress -> name = $req->name;
        $uaddress -> uphone = $req->uphone;
        $uaddress -> address = $req->sheng.'-'.$req->shi.'-'.$req->xian; //地址
        $uaddress -> xadress = $req->xadress; //详细地址

        if($uaddress -> save()){
            return redirect('/uaddress')->with('success','修改地址成功');
        }else{
            return back()->with('error','修改地址失败');
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
        //
        $uaddress = Uaddress::findOrFail($id);

        if($uaddress->delete()){
            return redirect('/uaddress')->with('success','删除地址成功');
        }else{
            return back()->with('error','删除地址失败');
        }
    }
}
