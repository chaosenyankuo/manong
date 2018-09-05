<?php

namespace App\Http\Controllers;

use App\Wuliu;
use Illuminate\Http\Request;

class WuliuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         //读取数据库 获取标签数据
        $wuliu = wuliu::orderBy('id','desc')
            ->where('name','like', '%'.request()->keywords.'%')
            ->get();
            // dd($wuliu);
        //解析模板显示用户数据
        return view('admin.wuliu.index', ['wuliu'=>$wuliu]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.wuliu.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $wuliu = new wuliu;

        $wuliu -> name = $request->name;

        if($wuliu -> save()){
            return redirect('/wuliu')->with('success', '添加成功');
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
         //获取物流公司的信息
        $wuliu = wuliu::findOrFail($id);
        //解析模板显示数据
        return view('admin.wuliu.edit', ['wuliu'=>$wuliu]);

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
        //获取物流公司
        $wuliu = wuliu::findOrFail($id);

        //更新
        $wuliu -> name = $request->name;

        if($wuliu->save()){
            return redirect('/wuliu')->with('success','更新成功');
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
          $wuliu = wuliu::findOrFail($id);

        if($wuliu->delete()){
            return back()->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }
}
