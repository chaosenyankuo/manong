<?php

namespace App\Http\Controllers;

use App\Lunbotu;
use Illuminate\Http\Request;

class LunbotuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lunbotu = Lunbotu::orderBy('id','asc')->paginate(3);
            
            
       return view('admin.lunbotu.index',compact('lunbotu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
         return view('admin.lunbotu.create');
       
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
         $lunbotu = new Lunbotu;

        $lunbotu -> pic = $request ->pic;
        $lunbotu -> url = $request ->url;
        if ($request->hasFile('pic')) {
            $lunbotu -> pic = '/'.$request->pic->store('uploads/'.date('Ymd'));
        }else{
            $lunbotu -> pic = '/uploads/1.jpg';
        } 

        if($lunbotu -> save()){
            return redirect('/lunbotu')->with('success','添加成功');
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
        $lunbotu = Lunbotu::findOrFail($id);

        return view('admin.lunbotu.edit',['lunbotu'=>$lunbotu]);
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
       
        $lunbotu = lunbotu::findOrFail($id);

        $lunbotu -> pic = $request->pic;
        $lunbotu -> url = $request->url;
        if ($request->hasFile('pic')) {
            $lunbotu -> pic = '/'.$request->pic->store('uploads/'.date('Ymd'));
        }else{
            $lunbotu -> pic = '/uploads/1.jpg';
        } 
        if($lunbotu -> save()){
            return redirect('/lunbotu')->with('success', '更新成功');
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
        $lunbotu = lunbotu::findOrFail($id);
        if($lunbotu->delete()){
             return redirect('/lunbotu')->with('success','删除成功');
        }else{
             return back()->with('error','删除失败');
        }
    }
}
