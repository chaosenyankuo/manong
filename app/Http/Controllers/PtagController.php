<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Ptag;

class PtagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ptags = Ptag::orderBy('id','asc')
       
            ->where('ptname','like', '%'.request()->ptname.'%')
            ->paginate(3);
        
        return view('admin.ptag.index', ['ptags'=>$ptags]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.ptag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $ptag = new Ptag;

        $ptag -> ptname = $request ->ptname;
       


        if($ptag -> save()){
            return redirect('/ptag')->with('success','添加成功');
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
        $ptag = Ptag::findOrFail($id);

        return view('admin.ptag.edit',['ptag'=>$ptag]);
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
         $ptag = Ptag::findOrFail($id);

        $ptag -> ptname = $request->ptname;
      
        if($ptag -> save()){
            return redirect('/ptag')->with('success', '更新成功');
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
        //
        $ptag = Ptag::findOrFail($id);
        if($ptag->delete()){
             return redirect('/ptag')->with('success','删除成功');
        }else{
             return back()->with('error','删除失败');
        }
    }
}
