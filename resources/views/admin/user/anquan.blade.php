@extends('layouts.admin')

@section('title','用户安全设置')

@section('content')


    

        <div class="col-lg-12">
            <div class="card">
                <div class="card-action">
                    用户安全设置
                </div>
                <div class="card-content">
                    <form class="col s12" action="/user/{{$user -> id}}/doanquan" method="post" enctype="multipart/form-data">
                        <h3>登录密码</h3>
                        <div class="row">
                        	<h5>修改登录密码</h5>
                            <div class="input-field col s12">
                                <input id="password" type="password" class="validate" name="loginpwd">
                                <label for="password">登录密码</label>
                            </div>
                        </div>
                        
                        <button class="waves-effect waves-light btn" style="margin-left:400px;">提交</button>
                    </form>
                    <div class="clearBoth"></div>
                </div>
            </div>
        </div>

<!-- /. PAGE WRAPPER  -->

@endsection