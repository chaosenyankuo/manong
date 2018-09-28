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
    <script src="../AmazeUI-2.4.2/assets/js/jquery.min.js" type="text/javascript"></script>
    <script src="../AmazeUI-2.4.2/assets/js/amazeui.js" type="text/javascript"></script>
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
                <!--进度条-->
                <div class="m-progress">
                    <div class="m-progress-list">
                        <span class="step-1 step">
                                <em class="u-progress-stage-bg"></em>
                                <i class="u-stage-icon-inner">1<em class="bg"></em></i>
                                <p class="stage-name">重置密码</p>
                            </span>
                        <span class="step-2 step">
                                <em class="u-progress-stage-bg"></em>
                                <i class="u-stage-icon-inner">2<em class="bg"></em></i>
                                <p class="stage-name">完成</p>
                            </span>
                        <span class="u-progress-placeholder"></span>
                    </div>
                    <div class="u-progress-bar total-steps-2">
                        <div class="u-progress-bar-inner"></div>
                    </div>
                </div>
                <form class="am-form am-form-horizontal" method="post" action="/home/login">
                    <div class="am-form-group">
                        <label for="user-old-password" class="am-form-label">邮箱帐号</label>

                        <div class="am-form-content">
                            <input type="email" id="user-old-password" placeholder="请输入注册时使用的邮箱帐号">

                        </div>
                    </div>
                     <button>点击发送验证码</button>
                    
                    <div class="am-form-group">
                        <label for="user-new-password" class="am-form-label">验证码</label>
                        <div class="am-form-content">
                            <input type="password" id="user-old-password" placeholder="请输入验证码">
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="user-new-password" class="am-form-label">新密码</label>
                        <div class="am-form-content">
                            <input type="password" id="user-new-password" placeholder="由数字、字母组合">
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="user-confirm-password" class="am-form-label">确认密码</label>
                        <div class="am-form-content">
                            <input type="password" id="user-confirm-password" placeholder="请再次输入上面的密码">
                        </div>
                    </div>
                    <div class="info-btn">
                        {{csrf_field()}}
                        <button class="am-btn am-btn-danger">保存修改</button>
                    </div>
                </form>
            </div>
            <!--底部-->
            @include('layouts.home._foot')
        </div>
    </div>
</body>

</html>