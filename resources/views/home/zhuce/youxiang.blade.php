<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">
    <title>模板</title>
    <link href="AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
    <link href="AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">
    <link href="css/personal.css" rel="stylesheet" type="text/css">
    <link href="css/stepstyle.css" rel="stylesheet" type="text/css">
    <script src="/home/AmazeUI-2.4.2/assets/js/jquery.min.js" type="text/javascript"></script>
    <script src="/home/AmazeUI-2.4.2/assets/js/amazeui.js" type="text/javascript"></script>
</head>

<body>
    <!--头 -->
    @include('layouts.home._top')
    <div class="center">
        <div class="col-main">
            <div class="main-wrap">
                <div class="am-cf am-padding">
                    <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">重置密码</strong> / <small>Password</small></div>
                </div>
                <hr/>
                <form class="am-form am-form-horizontal" method="post" action="/home/wjmima">
                    <div class="am-form-group">
                        <label for="user-old-password" name="email" class="am-form-label">邮箱帐号</label>
                        <div class="am-form-content">
                            <input type="email" id="user-old-password" name="email" placeholder="请输入注册时使用的邮箱帐号">
                            <br>
                            <button class="yzm1" type="button">点击发送验证码</button>
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
                    </div>
                    <div class="am-form-group">
                        <label for="user-old-password" class="am-form-label">验证码</label>
                        <div class="am-form-content">
                            <input type="text" id="user-old-password" class="yz" placeholder="请输入您收到的验证码">
                        </div>
                        
                    </div>
                    <div class="yzmm"></div>
                    <div class="am-form-group">
                        <label for="user-new-password" class="am-form-label">新密码</label>
                        <div class="am-form-content">
                            <input type="password" name="password" id="user-new-password" placeholder="由数字、字母组合">
                        </div>
                       
                    </div>
                     <div class="password"></div>
                    <div class="am-form-group">
                        <label for="user-confirm-password" class="am-form-label">确认密码</label>
                        <div class="am-form-content">
                            <input type="password" name="repassword" id="user-confirm-password" placeholder="请再次输入上面的密码">
                        </div>
                        
                    </div>
                    <div class="querenmima"></div>
                    <div class="info-btn">
                        {{csrf_field()}}
                        <button type="submit" class="am-btn am-btn-danger">保存修改</button>
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
                    $('.yzmm').show().html('<span style="color:green;font-size:12px;font-weight:bold">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;✔</span>');
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
                    $('.password').show().html('<span style="color:green;font-size:12px;font-weight:bold">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;✔</span>');
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

                    $('.querenmima').show().html('<span style="color:green;font-size:12px;font-weight:bold">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;✔</span>');
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
            <!--底部-->
            @include('layouts.home._foot')
        </div>
    </div>
</body>

</html>