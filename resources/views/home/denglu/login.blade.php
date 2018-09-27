<!DOCTYPE html>
<html>

<head lang="en">
    <meta charset="UTF-8">
    <title>登录</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="stylesheet" href="/home/AmazeUI-2.4.2/assets/css/amazeui.css" />
    <link href="/home/css/dlstyle.css" rel="stylesheet" type="text/css">
    <script src="/home/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
</head>

<body>
    <div class="login-boxtitle">
        <a href="/"><img alt="logo" src="/logo.png" /></a>
    </div>
    <div class="login-banner">
        <div class="login-main">
            <div class="login-banner-bg"><span></span><img src="/home/images/big.jpg" /></div>
            <div class="login-box">
                <h3 class="title"></h3>
                <div class="clear"></div>
                <div class="login-form">
                    <form action="/home/dologin" method="post">
                        <div class="am-cf">
                            @if(Session::has('error'))
                            <input id="baocuo" type="text" name="baocuo" value="{{Session::get('error')}}" class="am-btn res-banner  am-btn-primary am-btn-sm am-fl" style="height:30px;"> @endif
                        </div>
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
                            <a href="/home/wjma" style="margin-left:150px;">忘记密码</a>
                        </div>
                        {{csrf_field()}}
                        <div class="am-cf">
                            <input type="submit" name="" value="登 录" class="am-btn am-btn-primary am-btn-sm">
                        </div>
                    </form>
                </div>
                 <a href="/home/zhuce"style="float:right;">账号注册</a>
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
    <script>
    setTimeout(function() {
        $('#baocuo').css('display', 'none');
    }, 2000);
    </script>
</body>

</html>