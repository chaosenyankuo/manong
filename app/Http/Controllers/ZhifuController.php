<?php

namespace App\Http\Controllers;

use App\Zhifu;
use Illuminate\Http\Request;

class ZhifuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
           //读取数据库 获取公司名字
        $zhifu = zhifu::orderBy('id','desc')
            ->where('name','like', '%'.request()->keywords.'%')            
            ->get();
            // dd($zhifu);
        //解析模板显示用户数据
        return view('admin.zhifu.index', ['zhifu'=>$zhifu]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.zhifu.create');
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
        $zhifu = new zhifu;

        $zhifu -> name = $request->name;

        if($zhifu -> save()){
            return redirect('/zhifu')->with('success', '添加成功');
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          //获取合作公司的信息
        $zhifu = zhifu::findOrFail($id);
        //解析模板显示数据
        return view('admin.zhifu.edit', ['zhifu'=>$zhifu]);
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
          //获取支付合作公司
        $zhifu = zhifu::findOrFail($id);

        //更新
        $zhifu -> name = $request->name;

        if($zhifu->save()){
            return redirect('/zhifu')->with('success','更新成功');
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
        

          $zhifu = zhifu::findOrFail($id);

        if($zhifu->delete()){
            return back()->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }
}
