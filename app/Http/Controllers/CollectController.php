<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Collect;
use App\User;
use App\Cate;
use App\Shop;

class CollectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        //
        $collects = Collect::orderBy('id','asc')
            ->where('User_id','like', '%'.request()->keywords.'%')
            ->paginate(3);
        return view('admin.collect.index',compact('collects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $users = User::all();
        $cates = Cate::all();
        $shop = Shop::all();
        foreach($cates as $v)
         { 
            dd($cates->shops);
         }
        return view('admin.collect.create',compact('users','cates','shop'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $collect = new Collect;

        $collect -> user_id = $request ->name;
        $collect -> shop_id = $request ->shop_id;


        if($collect -> save()){
            return redirect('/collect')->with('success','添加成功');
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
        //
    }
}
