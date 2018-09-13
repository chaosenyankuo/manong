<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Link;
use App\Setting;
use App\Yjfk;


class YjfkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $setting = Setting::first();
        $links = Link::all();
        $id = \Session::get('id');
        $user  = User::findOrFail($id);
        return view('home.yjfk.create',compact('user','links','setting'));
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
        $setting = Setting::first();
        $links = Link::all();
        $id = \Session::get('id');
        $user  = User::findOrFail($id);
        $yjfk = new Yjfk;
        $yjfk -> user_id = $id;
        $yjfk -> content = $request->content;
        if($yjfk -> save()){
            return redirect('/home/yjfk')->with('success', '恭喜您,反馈成功!');
        }else{
            return back()->with('error','反馈失败,再从新试试吧!');
        }
        return view('home.yjfk.create',compact('user','links','setting','yjfk'));
        
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
        
    }

    
}
