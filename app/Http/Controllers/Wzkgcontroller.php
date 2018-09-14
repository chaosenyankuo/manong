<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class Wzkgcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         return view('admin.wzkg.index');
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
         $path = 'F:\xampp\htdocs\jszuoye\xiangmu\manong\storage\framework/down';
        if(!is_file($path))
        {
            File::copy('F:\xampp\htdocs\jszuoye\xiangmu\manong\storage\framework/adown', 'F:\xampp\htdocs\jszuoye\xiangmu\manong\storage\framework/down');
            
            return redirect('/wzkg')->with('success','网站关闭成功!!!');
        }
            return back()->with('error','网站已经关闭,别点我了!!!');
            return view('admin.wzkg.index');
           
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
        //
<<<<<<< HEAD
        $path = 'F:\xampp\htdocs\jszuoye\xiangmu\manong\storage\framework/down';
        if(is_file($path))
        {
            File::delete('F:\xampp\htdocs\jszuoye\xiangmu\manong\storage\framework/down');
=======
        $path = 'F:/xampp/htdocs/javascript/shangcheng/manong/storage/framework/down';
        if(is_file($path))
        {
            File::delete($path);
>>>>>>> 46889d6e652681f457bfa69b91886be4831a9d0d
           
             return redirect('/wzkg')->with('success','恭喜维护完成!!!');
        } else {

              return back()->with('error','网站已经开启,别点我了!!!');
        }
         return view('admin.wzkg.index');
    }
}
