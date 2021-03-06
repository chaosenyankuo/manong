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
    .remind{
        display:none;
    }
    .email{
        display:none;
    }
    
</style>
<body>
    <div class="login-boxtitle">
        <a href="/"><img alt="" src="/logo.png" /></a>
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
                                <div class="email"></div>
                                <div class="user-pass">
                                    <label for="password"><i class="am-icon-lock"></i></label>
                                    <input type="password" name="password" id="password" placeholder="设置密码">
                                </div>
                                <div class="password"></div>
                                <div class="user-pass">
                                    <label for="passwordRepeat"><i class="am-icon-lock"></i></label>
                                    <input type="password" name="loginpwds" id="loginpwds" placeholder="确认密码">
                                </div>
                                <div class="querenmima"></div>
                                <div class="am-cf">
                                    {{csrf_field()}}
                                    <input type="hidden" name='qx' value="2">
                                    <input type="submit" name="" value="注册" class="am-btn am-btn-primary am-btn-sm am-fl">
                                </div>
                                
                            </form>
                        </div>

                       

                        <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>

                        <script>


                        $('#email').blur(function() {
                            var v = $(this).val();
                            var reg = /^[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*\.[a-zA-Z0-9]{2,6}$/;
                            if(!reg.test(v)){
                                $('.email').show().html('<center><span style="color:red;font-size:10px;">请按正确格式输入邮箱</span><center/>');
                                CUSER = false;
                            }else{
                            var v = $(this).val();
                            $.ajax({
                                url: '/check-user-exists.php',
                                type: 'post',
                                data: { email: v },
                                success: function(data) {
                                    if (data == 0) {
                                       $('.email').show().html('<center><span style="color:red;font-size:10px;">该邮箱已被注册</span><center/>');
                                       CUSER = false;
                                    }else{
                                        $('.email').show().html('<span style="color:green;font-size:12px;font-weight:bold">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;✔</span>');
                                        CUSER = true;
                                    }
                                }
                            })
                            }
                        });
                        $('#password').blur(function(){
                            var v = $(this).val();
                            var reg = /^\w{6,20}$/;
                            if(!reg.test(v)){
                                $('.password').show().html('<center><span style="color:red;font-size:10px;" >请输入6-20位非空白字符</span><center/>');
                                PASS = false;
                            }else{
                                $('.password').show().html('<span style="color:green;font-size:12px;font-weight:bold">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;✔</span>');
                                PASS = true;
                            }
                        })

                        //确认密码
                        $('#loginpwds').blur(function(){
                            
                            //获取用户的输入值
                            var v = $(this).val();
                            
                            if(v != $('input[name=password]').val()) {
                             $('.querenmima').show().html('<center><span style="color:red;font-size:10px;" >两次密码输入不一致</span><center/>');
                                CPASS = false;
                            }else{
                                 
                                 $('.querenmima').show().html('<span style="color:green;font-size:12px;font-weight:bold">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;✔</span>');
                                CPASS = true;
                            }
                        })
                                            //表单的提交事件
                            $('form').submit(function(){
                                //触发错误提醒
                                $('input').trigger('blur');
                                //判断输入值是否都正确
                                if(CUSER  && PASS && CPASS) {
                                    return true;
                                }else{
                                    return false;
                                }
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