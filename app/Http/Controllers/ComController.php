<?php

namespace App\Http\Controllers;

use App\Com;
use Illuminate\Http\Request;

class ComController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coms = Com::orderBy('id','desc')
            ->where('name','like','%'.request()->keywords.'%')
            ->paginate(5);
        return view('admin.com.index',compact('coms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.com.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $com = new Com;
        $com -> name = $request -> name; 
        if($com->save()){
            return redirect('/com')->with('success','添加成功');
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
        $com = Com::findOrFail($id);
        return view('admin.com.edit',compact('com'));
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
        $com = Com::findOrFail($id);
        $com -> name = $request -> name;
        if($com->save()){
            return redirect('/com')->with('success','修改成功');
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
        $com = Com::findOrFail($id);
        if($com->delete()){
            return redirect('/com')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }
}
