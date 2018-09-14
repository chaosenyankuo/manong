<?php

namespace App\Http\Controllers;

use App\Sctt;
use Illuminate\Http\Request;

class Scttcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sctt = Sctt::orderBy('id','asc')->paginate(3);
        // dd($sctt);
         return view('admin.Sctt.index',compact('sctt'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Sctt.create',compact('sctt'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $sctt = new Sctt;

        $sctt -> scth = $request ->scth;
        $sctt -> scgg = $request ->scgg;
        $sctt -> scgg_url = $request ->scgg_url;
        $sctt -> scth_url = $request ->scth_url;
      

        if($sctt -> save()){
            return redirect('/sctt')->with('success','添加成功');
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
        $sctt = Sctt::findOrfail($id);
        // dd($sctt);
        return view('admin.Sctt.edit',compact('sctt'));
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
        $sctt = Sctt::findOrfail($id);
        $sctt -> scth = $request ->scth;
        $sctt -> scgg = $request ->scgg;
        $sctt -> scgg_url = $request ->scgg_url;
        $sctt -> scth_url = $request ->scth_url;
      

        if($sctt -> save()){
            return redirect('/sctt')->with('success','更新成功');
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
        $sctt = Sctt::findOrfail($id);
         if($sctt->delete()){
             return redirect('/sctt')->with('success','删除成功');
        }else{
             return back()->with('error','删除失败');
        }
    }
}
