<?php

namespace App\Http\Controllers;

use App\Yhj;
use Illuminate\Http\Request;

class YhjController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
         $yhj = Yhj::orderBy('id','asc')->paginate(4);
        return view('admin.yhj.index',compact('yhj'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.yhj.create');
        
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
        $yhj = new Yhj;

        $yhj -> yhj_pic = $request ->yhj_pic;
        $yhj -> yhj_id = $request ->yhj_id;
        $yhj -> yhj_pay = $request ->yhj_pay;
        $yhj -> cycle = $request ->cycle;
        $yhj -> prize = $request ->prize;
        if ($request->hasFile('yhj_pic')) {
            $yhj -> yhj_pic = '/'.$request->yhj_pic->store('yhjpic/'.date('Ymd'));
        }else{
            $yhj -> pic = '/yhjpic/1.jpg';
        } 

        if($yhj -> save()){
            return redirect('/yhj')->with('success','添加成功');
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
        $yhj = Yhj::findOrFail($id);
       
        return view('admin.yhj.edit',compact('yhj'));
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
        $yhj = yhj::findOrFail($id);
        $yhj -> yhj_pic = $request ->yhj_pic;
        $yhj -> yhj_id = $request ->yhj_id;
        $yhj -> yhj_pay = $request ->yhj_pay;
        $yhj -> cycle = $request ->cycle;
        $yhj -> prize = $request ->prize;
        if ($request->hasFile('yhj_pic')) {
            $yhj -> yhj_pic = '/'.$request->yhj_pic->store('yhjpic/'.date('Ymd'));
        }else{
            $yhj -> pic = '/yhjpic/1.jpg';
        } 

        if($yhj -> save()){
            return redirect('/yhj')->with('success','更新成功');
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
     
        $yhj = yhj::findOrFail($id);
        if($yhj->delete()){
             return redirect('/yhj')->with('success','删除成功');
        }else{
             return back()->with('error','删除失败');
        }
    }
}
