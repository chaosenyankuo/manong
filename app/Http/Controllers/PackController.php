<?php

namespace App\Http\Controllers;

use App\Pack;
use Illuminate\Http\Request;

class PackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $packs = Pack::orderBy('id','desc')
            ->where('pname','like','%'.request()->keywords.'%')
            ->paginate(5);
        return view('admin.pack.index',compact('packs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pack.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pack = new Pack;
        $pack -> pname = $request -> pname; 
        if($pack->save()){
            return redirect('/pack')->with('success','添加成功');
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
        $pack = Pack::findOrFail($id);
        return view('admin.pack.edit',compact('pack'));
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
        $pack = Pack::findOrFail($id);
        $pack -> pname = $request -> pname;
        if($pack->save()){
            return redirect('/pack')->with('success','修改成功');
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
        $pack = Pack::findOrFail($id);
        if($pack->delete()){
            return redirect('/pack')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }
}
