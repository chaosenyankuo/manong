<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Collect;
use App\User;
use App\Cate;
use App\Link;
use App\Setting;
use App\Shop;

class CollectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collects = Collect::all();
        return view('admin.collect.index',compact('collects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $users = User::all();
        $cates = Cate::all();
        $shops = Shop::all();
        return view('admin.collect.create',compact('users','cates','shops'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $uid = $request -> user_id;
        $res = Collect::where('user_id',$uid)
            ->where('shop_id', $request->shop_id)
            ->first();
        if(!empty($res)){
            return back()->with('error','该商品已在您的收藏中');
        }
        if(empty($res)){
            $collect = new Collect;
            $collect -> user_id = $request -> user_id;
            $collect -> shop_id = $request -> shop_id;
            if($collect -> save()){
                return redirect('/collect')->with('success','添加成功');
            }else{
                return back()->with('error','添加失败');
            }    
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
        $collect = Collect::findOrFail($id);
        if($collect->delete()){
            return redirect('/collect')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }

    public function first()
    {
        $cate_id = $_POST['cate'];

        $pdo = new \PDO('mysql:host=localhost;dbname=haochichi;charset=utf8','root','');

        $stmt = $pdo -> prepare('select * from shops where cate_id = ?');

        $arr = [$cate_id];

        $stmt->execute($arr);

        $shops = $stmt -> fetchAll();

        echo Json_encode($shops);//输出json格式的数据
    }

    public function cun(Request $request)
    {
        $uid = $request -> user_id;
        if(!empty($uid)){
            $res = Collect::where('user_id',$uid)
                ->where('shop_id', $request->shop_id)
                ->first();
            if(!empty($res)){
                return back()->with('error','该商品已在您的收藏中');
            }
            if(empty($res)){
                $collect = new Collect;
                $collect -> user_id = $request -> user_id;
                $collect -> shop_id = $request -> shop_id;
                if($collect -> save()){
                    return redirect('/home/collect')->with('success','添加收藏成功');
                }else{
                    return back()->with('error','添加收藏失败');
                }    
            }  
        }else{
            return back()->with('error','请先登录！');
        }      
        
    }

    public function zhanshi()
    {
        $uid = \Session::get('id');
        $user = User::find($uid);
        $links = Link::all();
        $setting = Setting::first();
        $collects = Collect::where('user_id',$uid)->get();
        $shops = Shop::all();
        return view('home.collect.zhanshi',compact('user','links','setting','collects','shops'));
    }

    public function delete(Request $request)
    {
        $id = $request -> id;
        $collect = Collect::findOrFail($id);
        if($collect->delete()){
            return redirect('/home/collect')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }
}
