@extends('layouts.admin') @section('title','用户修改') @section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-action">
            用户修改
        </div>
        <div class="card-content">
            <form class="col s12" action="/user/{{$user -> id}}" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="input-field col s6">
                        <input id="last_name" type="text" class="validate" name="nickname" value="{{$user-> nickname}}">
                        <label for="last_name">昵称</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="last_name" type="text" class="validate" name="uname" value="{{$user -> uname}}">
                        <label for="last_name" class="">姓名</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6" style="float:right;">
                        <label for="last_name">
                            <span style="font-size:15px;">性别</span>
                        </label>
                        <br> @if($user -> sex == '1')
                        <input name="sex" type="radio" id="test1" value="1" checked>
                        <label for="test1">男</label>
                        @else
                        <input name="sex" type="radio" id="test1" value="1">
                        <label for="test1">男</label>
                        @endif @if($user -> sex == '2')
                        <input name="sex" type="radio" id="test2" value="2" checked>
                        <label for="test2">女</label>
                        @else
                        <input name="sex" type="radio" id="test2" value="2">
                        <label for="test2">女</label>
                        @endif @if($user -> sex == '3')
                        <input class="with-gap" name="sex" type="radio" id="test3" value="3" checked>
                        <label for="test3">保密</label>
                        @else
                        <input class="with-gap" name="sex" type="radio" id="test3" value="3" checked>
                        <label for="test3">保密</label>
                        @endif
                    </div>
                    <div class="input-field col s6" style="float:right;">
                        <input type="text" id="input4" placeholder="生日" value="{{$user -> birthday}}" name="birthday">
                    </div>
                </div>
                <div class="row">
                    <div class="col s12">
                        邮箱
                        <div class="input-field inline">
                            <input id="email" type="email" class="validate" name="email" value="{{$user -> email}}">
                            <label for="email" data-error="wrong" data-success="right">Email</label>
                        </div>&nbsp;&nbsp;&nbsp;&nbsp; 电话
                        <div class="input-field inline">
                            <input id="email" type="text" class="validate" name="phone" value="{{$user -> phone}}">
                            <label for="email" data-error="wrong" data-success="right">Phone</label>
                        </div>&nbsp;&nbsp;&nbsp;&nbsp; 头像
                        <div class="input-field inline" style="width:200px;">
                            <input id="file" type="file" class="validate" name="image">
                            <label for="file" data-error="wrong" data-success="right"></label>
                        </div>
                        <img src="{{$user -> image}}" width="80" style="margin-top:0px;">
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input id="last_name" type="password" class="validate" name="lpass">
                        <label for="last_name">旧登录密码</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="password" type="password" class="validate" name="loginpwd">
                        <label for="password">新登录密码</label>
                    </div>
                </div>
                {{csrf_field()}} {{method_field('PUT')}}
                <button class="waves-effect waves-light btn" style="margin-left:400px;">提交</button>
            </form>
            <div class="clearBoth"></div>
        </div>
    </div>
</div>
<!-- /. PAGE WRAPPER  -->
<script src="/jquer_shijian.js?ver=1" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
$("#input4").shijian({
    startYear: 1960,
    endYear: 2018,
    Hour: false, //是否显示小时
    Minute: false, //是否显分钟
});
$(window).load(function() {
    $('input:lt(8)').trigger('focus');
    $('input:lt(8)').trigger('blur');

});
</script>
@endsection