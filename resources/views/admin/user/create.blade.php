@extends('layouts.admin') @section('title','用户添加') @section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-action">
            用户添加
        </div>
        <div class="card-content">
            <form class="col s12" action="/user" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="input-field col s6">
                        <input id="last_name" type="text" class="validate" name="nickname">
                        <label for="last_name" class="">昵称</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="last_name" type="text" class="validate" name="uname">
                        <label for="last_name" class="">姓名</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6" style="float:right;">
                        <label for="last_name"><span style="font-size:15px;">性别</span></label>
                        <br>
                        <input name="sex" type="radio" id="test1" value="1">
                        <label for="test1">男</label>
                        <input name="sex" type="radio" id="test2" value="2">
                        <label for="test2">女</label>
                        <input class="with-gap" name="sex" type="radio" id="test3" value="3">
                        <label for="test3">保密</label>
                    </div>
                       <div class="input-field col s6" style="float:right;">
                        <label for="last_name"><span style="font-size:15px;">级别</span></label>
                        <br>
                        <input name="qx" type="radio" id="qx1" value="1">
                        <label for="qx1">管理员</label>
                        <input name="qx" type="radio" id="qx2" value="2">
                        <label for="qx2">银牌会员</label>
                        <input class="with-gap" name="qx" type="radio" id="qx3" value="3">
                        <label for="qx3">金牌会员</label>
                    </div>
                    <div class="input-field col s12" style="float:right;">
                        <input type="text" id="input4" placeholder="生日" name="birthday">
                    </div>
                </div>
               
                <div class="row">
                    <div class="input-field col s12">
                        <input id="password" type="password" class="validate" name="loginpwd">
                        <label for="password">登录密码</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12">
                        邮箱
                        <div class="input-field inline">
                            <input id="email" type="email" class="validate" name="email">
                            <label for="email" data-error="wrong" data-success="right">Email</label>
                        </div>&nbsp;&nbsp;&nbsp;&nbsp; 电话
                        <div class="input-field inline">
                            <input id="email" type="text" class="validate" name="phone">
                            <label for="email" data-error="wrong" data-success="right">Phone</label>
                        </div>&nbsp;&nbsp;&nbsp;&nbsp; 积分
                        <div class="input-field inline">
                            <input id="jfen" type="number" class="validate" name="jifen">
                            <label for="jfen" data-error="wrong" data-success="right">JiFen</label>
                        </div>&nbsp;&nbsp;&nbsp;&nbsp; 头像
                        <div class="input-field inline">
                            <input id="file" type="file" class="validate" name="image">
                            <label for="file" data-error="wrong" data-success="right"></label>
                        </div>
                    </div>
                </div>
                {{csrf_field()}}
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
})
</script>
@endsection