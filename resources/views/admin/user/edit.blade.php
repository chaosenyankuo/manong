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
                        <label for="last_name">
                            <span style="font-size:15px;">级别</span>
                        </label>
                        <br> @if($user -> qx == '1')
                        <input name="qx" type="radio" id="qx1" value="1" checked>
                        <label for="qx1">管理员</label>
                        @else
                        <input name="qx" type="radio" id="qx1" value="1">
                        <label for="qx1">管理员</label>
                        @endif @if($user -> qx == '2')
                        <input name="qx" type="radio" id="qx2" value="2" checked>
                        <label for="qx2">银牌会员</label>
                        @else
                        <input name="qx" type="radio" id="qx2" value="2">
                        <label for="qx2">银牌会员</label>
                        @endif @if($user -> qx == '3')
                        <input class="with-gap" name="qx" type="radio" id="qx3" value="3" checked>
                        <label for="qx3">金牌会员</label>
                        @else
                        <input class="with-gap" name="sex" type="radio" id="qx3" value="3">
                        <label for="qx3">金牌会员</label>
                        @endif
                    </div>
                    <div class="input-field col s12" style="float:right;">
                        <input type="text" id="input4" placeholder="生日" value="{{$user -> birthday}}" name="birthday"> 
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input id="last_name" type="text" class="validate" name="email" value="{{$user-> email}}">
                        <label for="last_name">邮箱</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="last_name" type="text" class="validate" name="phone" value="{{$user-> phone}}">
                        <label for="last_name">电话</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input id="last_name" type="number" class="validate" name="jifen" value="{{$user->jifen}}">
                        <label for="last_name">积分</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="file" type="file" class="validate" name="image">
                        <img src="{{$user -> image}}" width="80" style="margin-top:0px;">
                        <label for="file" data-error="wrong" data-success="right" 头像></label>
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
<script src="/time/jquer_shijian.js?ver=1" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
$("#input4").shijian({
    startYear: 1960,
    endYear: 2018,
    Hour: false, //是否显示小时
    Minute: false, //是否显分钟
});
$(window).load(function() {
    $('input:lt(20)').trigger('focus');
    $('input:lt(20)').trigger('blur');

});
</script>
@endsection