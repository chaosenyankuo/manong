<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::orderBy('id','desc')
            ->where('uname','like', '%'.request()->keywords.'%')
            ->paginate(10);
        return view('admin/user/index',['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin/user/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $users = new User;

        $users -> nickname = $req->nickname;
        $users -> uname = $req->uname;
        $users -> birthday = $req->birthday;
        $users -> sex = $req->sex;
        $users -> loginpwd = Hash::make($req->loginpwd);
        $users -> email = $req->email;
        $users -> phone = $req->phone;
        $users -> qx = $req ->qx;
        $users -> jifen = $req ->jifen;

        //检测是否传文件
        if ($req->hasFile('image')) {
            $users -> image = '/'.$req->image->store('uploads/'.date('Ymd'));
        }else{
            $users -> image = '/uploads/1.jpg';
        } 

        if($users -> save()){
            return redirect('/user')->with('success', '添加用户成功');
        }else{
            return back()->with('error','用户添加失败');
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
        $user = User::findOrFail($id);

        return view('admin/user/edit',['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        //
        $user = User::findOrFail($id);

        $user -> nickname = $req -> nickname;
        $user -> uname = $req -> uname;
        $user -> birthday = $req -> birthday;
        $user -> sex = $req -> sex;
        $user -> email = $req -> email;
        $user -> phone = $req -> phone;
        $user -> qx = $req -> qx;
        $user -> jifen = $req -> jifen;

        if ($req->hasFile('image')) {
            $user -> image = '/'.$req->image->store('uploads/'.date('Ymd'));
        }

        if($req->lpass){
            if(Hash::check($req->lpass,$user->loginpwd)){
                $user -> loginpwd = Hash::make($req -> loginpwd);
            }else{
                return back()->with('error','修改登录密码失败');
            }
        }

        if($user -> save()){
            return redirect('/user')->with('success','修改用户成功');
        }else{
            return back()->with('error','修改用户失败');
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
        $user = User::findOrFail($id);

        if($user -> delete()){
            return redirect('/user')->with('success','删除用户成功');
        }else{
            return back()->with('error','删除用户失败');
        }
    }
}
