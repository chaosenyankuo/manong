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
<style>
.remind {
    display: none;
}

.email {
    display: none;
}
</style>

<body>
    <div class="login-boxtitle">
        <a href="/"><img alt="" src="/logo.png" /></a>
    </div>
    <div class="res-banner">
        <div class="res-main" >
            <div class="login-banner-bg"><span></span><img src="/home/images/big.jpg" /></div>
            <div class="login-box" >
                <div class="main-wrap">
                <div class="am-cf center">
                    <div class="center">重置密码/ <small>Password</small></div>
                </div>
                
                <form action="/home/wjmima" method="post">
                        <div class="user-name">
                        <label for="email"><i class="am-icon-envelope-o"></i></label>
                            <input type="email" name="email" id="user" placeholder="请输入邮箱">
                            <br><button class="yzm1" style="float:right;"type="button">点击发送验证码</button>
                        </div>
                         <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                        <script type="text/javascript">
                        $('.yzm1').click(function() {
                            var val = $('input[name=email]').val();
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });
                            $.ajax({
                                url: '/sendemail',
                                type: 'post',
                                data: { val: val },
                                success: function(data) {

                                },
                                async: false
                            })
                            // return false;
                        })
                        </script>
                        <br><br>
                        <div class="user-pass">
                            <label for="email"><i class="am-icon-envelope-o"></i></label>
                            <input type="number" class="yz" id="password" placeholder="请输入验证码">
                        </div>
                        <div class="yzmm"></div>
                        <div class="user-pass">
                            <label for="password"><i class="am-icon-lock"></i></label>
                            <input type="password" name="password" id="password" placeholder="请输入密码">
                        </div>
                        <div class="password"></div>
                        <div class="user-pass">
                            <label for="password"><i class="am-icon-lock"></i></label>
                            <input type="password" name="repassword" id="password" placeholder="请再次输入密码">
                        </div>
                        
                        <div class="querenmima"></div>
                        <div class="info-btn">
                        {{csrf_field()}}
                        <input type="submit" name="" value="保存修改" class="am-btn am-btn-primary am-btn-sm am-fl">
                    </div>
                    </form>
            </div>
            <input type="hidden" name="ma" value="">
            <script type="text/javascript">
            $('.yz').focus(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '/sendl',
                    type: 'post',
                    success: function(data) {
                        var data = JSON.parse(data);
                        if (data) {
                            $('input[name=ma]').val(data);
                        }
                    },
                    async: false
                })
            });

            $('.yz').blur(function() {
                if ($(this).val() != $('input[name=ma]').val()) {
                    $('.yzmm').show().html('<center><span style="color:red;font-size:10px;">验证码错误</span><center/>');
                    YZM = false;
                } else {
                    $('.yzmm').show().html('<span style="color:green;font-size:12px;font-weight:bold">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;✔</span>');
                    YZM = true;
                }
            });

            $('input[name=password]').blur(function() {
                var v = $(this).val();
                var reg = /^\w{6,20}$/;
                if (!reg.test(v)) {
                    $('.password').show().html('<center><span style="color:red;font-size:10px;" >请输入6-20位非空白字符</span><center/>');
                    PASS = false;
                } else {
                    $('.password').show().html('<span style="color:green;font-size:12px;font-weight:bold">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;✔</span>');
                    PASS = true;
                }
            });

            $('input[name=repassword]').blur(function() {

                //获取用户的输入值
                var v = $(this).val();

                if (v != $('input[name=password]').val()) {
                    $('.querenmima').show().html('<center><span style="color:red;font-size:10px;" >两次密码输入不一致</span><center/>');
                    CPASS = false;
                } else {

                    $('.querenmima').show().html('<span style="color:green;font-size:12px;font-weight:bold">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;✔</span>');
                    CPASS = true;
                }
            });

            $('form').submit(function() {
                //触发错误提醒
                $('input').trigger('blur');
                
                //判断输入值是否都正确
                if (YZM && PASS && CPASS) {
                    return true;
                } else {
                    return false;
                }
            });
            </script>
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