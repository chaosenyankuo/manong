<?php

namespace App\Http\Controllers;

use App\Flavor;
use Illuminate\Http\Request;

class FlavorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $flavors = Flavor::orderBy('id','desc')
            ->where('fname','like','%'.request()->keywords.'%')
            ->paginate(5);
        return view('admin.flavor.index',compact('flavors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.flavor.create');      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $flavor = new Flavor;
        $flavor -> fname = $request -> fname; 
        if($flavor->save()){
            return redirect('/flavor')->with('success','添加成功');
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
        $flavor = Flavor::findOrFail($id);
        return view('admin.flavor.edit',compact('flavor'));
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
        $flavor = Flavor::findOrFail($id);
        $flavor -> fname = $request -> fname;
        if($flavor->save()){
            return redirect('/flavor')->with('success','修改成功');
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
        $flavor = Flavor::findOrFail($id);
        if($flavor->delete()){
            return redirect('/flavor')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }
}
