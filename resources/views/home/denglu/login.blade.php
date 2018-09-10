<!DOCTYPE html>
<html>

<head lang="en">
    <meta charset="UTF-8">
    <title>{{$setting['title']}}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="stylesheet" href="/home/AmazeUI-2.4.2/assets/css/amazeui.css" />
    <link href="/home/css/dlstyle.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="login-boxtitle">
        <a href="home.html"><img alt="logo" src="/home./images/logobig.png" /></a>
    </div>
    <div class="login-banner">
        <div class="login-main">
            <div class="login-banner-bg"><span></span><img src="/home/images/big.jpg" /></div>
            <div class="login-box">
                <h3 class="title"></h3>
                <div class="clear"></div>
                <div class="login-form">
                    <form action="/home/dologin" method="post">
                    @if(Session::has('error'))
                    <div class="am-cf">
                            <span type="text" class="am-btn am-btn-primary am-btn-sm" style="background:red;">{{Session::get('error')}}</span>
                        </div>
                    @endif
                        <div class="user-name">
                            <label for="user"><i class="am-icon-user"></i></label>
                            <input type="text" name="email" id="user" placeholder="请输入邮箱">
                        </div>
                        <div class="user-pass">
                            <label for="password"><i class="am-icon-lock"></i></label>
                            <input type="password" name="loginpwd" id="password" placeholder="请输入密码">
                        </div>
                        <div>
                            <input type="checkbox" style="width:10px;height:10px; float-left;"> 记住密码
                            <a href="" style="margin-left:150px;">忘记密码</a>
                        </div>
                         {{csrf_field()}}
                        <div class="am-cf">
                            <button type="submit" name="" value="登 录" class="am-btn am-btn-primary am-btn-sm">登录</button>
                        </div>
                    </form>
                </div>
                <div class="partner">
                    <h3>合作账号</h3>
                    <div class="am-btn-group">
                        <li><a href="#"><i class="am-icon-qq am-icon-sm"></i><span>QQ登录</span></a></li>
                        <li><a href="#"><i class="am-icon-weibo am-icon-sm"></i><span>微博登录</span> </a></li>
                        <li><a href="#"><i class="am-icon-weixin am-icon-sm"></i><span>微信登录</span> </a></li>
                    </div>
                </div>
            </div>
        </div>
    </div>
   @include('layouts.home._foot')
</body>

</html>