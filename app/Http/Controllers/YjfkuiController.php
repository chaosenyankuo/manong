<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Link;
use App\Setting;
use App\Yjfk;

class YjfkuiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $yjfk = Yjfk::all();
        $setting = Setting::first();
        $links = Link::all();
        $user = User::all();
        $yjfk = Yjfk::orderBy('id','asc')
            ->where('user_id','like', '%'.request()->keywords.'%')
            ->paginate(5);
        

        return view('admin.yjfk.index',compact('yjfk','links','setting','user'));
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
        //
        

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
        $yjfk = yjfk::findOrFail($id);

        if($yjfk -> delete()){
            return redirect('/admin/yjfkui')->with('success','删除用户成功');
        }else{
            return back()->with('error','删除用户失败');
        }
    }
}
