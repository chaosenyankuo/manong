<!DOCTYPE html>
<html>

<head lang="en">
    <meta charset="UTF-8">
    <title>注册</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="stylesheet" href="/home/AmazeUI-2.4.2/assets/css/amazeui.min.css" />
    <link href="/home/css/dlstyle.css" rel="stylesheet" type="text/css">
    <script src="/home/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
    <script src="/home/AmazeUI-2.4.2/assets/js/amazeui.min.js"></script>
</head>

<body>
    <div class="login-boxtitle">
        <a href="home/demo.html"><img alt="" src="/home/images/logobig.png" /></a>
    </div>
    <div class="res-banner">
        <div class="res-main">
            <div class="login-banner-bg"><span></span><img src="/home/images/big.jpg" /></div>
            <div class="login-box">
                <div class="am-tabs" id="doc-my-tabs">
                    <ul class="am-tabs-nav am-nav am-nav-tabs am-nav-justify">
                        <li class="am-active"><a href="">注册</a></li>
                    </ul>
                    <div class="am-tabs-bd">
                        <div class="am-tab-panel am-active">
                            <div class="am-cf">
                                @if(Session::has('error'))
                                <input id="baocuo" type="text" name="baocuo" value="{{Session::get('error')}}" class="am-btn res-banner  am-btn-primary am-btn-sm am-fl" style="height:30px;"> @endif
                            </div>
                            <form action="/home/store" method="post">
                                <div class="user-email">
                                    <label for="email"><i class="am-icon-envelope-o"></i></label>
                                    <input type="email" name="email" id="email" placeholder="请输入邮箱账号">
                                </div>
                                <div class="user-pass">
                                    <label for="password"><i class="am-icon-lock"></i></label>
                                    <input type="password" name="loginpwd" id="password" placeholder="设置密码">
                                </div>
                                <div class="user-pass">
                                    <label for="passwordRepeat"><i class="am-icon-lock"></i></label>
                                    <input type="password" name="loginpwds" id="passwordRepeat" placeholder="确认密码">
                                </div>
                                <div class="am-cf">
                                    {{csrf_field()}}
                                    <input type="submit" name="" value="注册" class="am-btn am-btn-primary am-btn-sm am-fl">
                                </div>
                            </form>
                        </div>

                        <div class="am-tab-panel">
                            <form action="/home/store" method="post">
                                <div class="user-phone">
                                    <label for="phone"><i class="am-icon-mobile-phone am-icon-md"></i></label>
                                    <input type="tel" name="phone" id="phone" placeholder="请输入手机号">
                                </div>
                                <div class="verification">
                                    <label for="code"><i class="am-icon-code-fork"></i></label>
                                    <input type="tel" name="" id="code" placeholder="请输入验证码">
                                    <a class="btn" href="javascript:void(0);" onclick="sendMobileCode();" id="sendMobileCode">
                                                <span id="dyMobileButton">获取</span></a>
                                </div>
                                <div class="user-pass">
                                    <label for="password"><i class="am-icon-lock"></i></label>
                                    <input type="password" name="loginpwd" id="password" placeholder="设置密码">
                                </div>
                                <div class="user-pass">
                                    <label for="passwordRepeat"><i class="am-icon-lock"></i></label>
                                    <input type="password" name="loginpwds" id="passwordRepeat" placeholder="确认密码">
                                </div>
                                <div class="am-cf">
                                    {{csrf_field()}}
                                    <input type="submit" name="" value="注册" class="am-btn am-btn-primary am-btn-sm am-fl">
                                </div>
                            </form>
                            <hr>

                        <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>

                        <script>
                        $('#email').blur(function() {
                            var v = $(this).val();
                            $.ajax({

                                url: '/check-user-exists.php',

                                type: 'post',

                                data: { email: v },

                                success: function(data) {
                                    if (data == 0) {
                                        alert('用户名已存在');
                                    }
                                }
                            })
                        });
                        </script>


                        <hr>

                    </div>
                    <script>
                    $(function() {
                        $('#doc-my-tabs').tabs();
                    })
                    </script>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.home._foot')
    <script>
    setTimeout(function() {
        $('#baocuo').css('display', 'none');
    }, 2000);
    scrollY("#scrollbox"); //单个Y轴
    </script>
</body>

</html>