<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">
    <title>个人资料</title>
    <link href="/home/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
    <link href="/home/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">
    <link href="/home/css/personal.css" rel="stylesheet" type="text/css">
    <link href="/home/css/infstyle.css" rel="stylesheet" type="text/css">
    <script src="/home/AmazeUI-2.4.2/assets/js/jquery.min.js" type="text/javascript"></script>
    <script src="/home/AmazeUI-2.4.2/assets/js/amazeui.js" type="text/javascript"></script>
</head>

<body>
    <!--头 -->
    <header>
        <article>
            <div class="mt-logo">
                <!--顶部导航条 -->
                @include('layouts.home._top')
            </div>
            </div>
        </article>
    </header>
    <div class="nav-table">
        <div class="long-title"><span class="all-goods">全部分类</span></div>
        <div class="nav-cont">
            <ul>
                <li class="index"><a href="#">首页</a></li>
                <li class="qc"><a href="#">闪购</a></li>
                <li class="qc"><a href="#">限时抢</a></li>
                <li class="qc"><a href="#">团购</a></li>
                <li class="qc last"><a href="#">大包装</a></li>
            </ul>
            <div class="nav-extra">
                <i class="am-icon-user-secret am-icon-md nav-user"></i><b></b>我的福利
                <i class="am-icon-angle-right" style="padding-left: 10px;"></i>
            </div>
        </div>
    </div>
    <b class="line"></b>
    <div style="width:1200px;">
        <div class="col-main">
            <div class="main-wrap">
                <div class="user-info">
                    <!--标题 -->
                    <div class="am-cf am-padding">
                        <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">个人资料</strong> / <small>Personal&nbsp;information</small></div>
                    </div>
                    <hr/>
                    <!--头像 -->
                    <form class="am-form am-form-horizontal" method="post" enctype="multipart/form-data">
                        <div class="user-infoPic">
                            <div class="filePic">
                                <input type="file" class="inputPic" name="image" allowexts="gif,jpeg,jpg,png,bmp" accept="image/*">
                                <img class="am-circle am-img-thumbnail" src="/home/images/getAvatar.do.jpg" alt="" />
                            </div>
                            <p class="am-form-help">头像</p>
                        </div>
                        <!--个人信息 -->
                        @if(Session::has('error'))
                         <div class="info-btn">
                                <button class="am-btn am-btn-danger">{{Session::get('error')}}</button>
                            </div>
                        @endif
                        <div class="info-main">
                            <div class="am-form-group">
                                <label for="user-name2" class="am-form-label">昵称</label>
                                <div class="am-form-content">
                                    <input type="text" id="user-name2" name="nickname">
                                </div>
                                <div class="nicknames"></div>
                            </div>
                             <div class="am-form-group">
                                <label for="user-phone" class="am-form-label">电话</label>
                                <div class="am-form-content">
                                    <input id="user-phone" name="phone" value="{{$users['phone']}}" type="tel">
                                </div>
                                <div class="phones"></div>
                            </div>
                            <div class="am-form-group">
                                <label class="am-form-label">性别</label>
                                <div class="am-form-content sex">
                                    <label class="am-radio-inline">
                                        <input type="radio" name="sex" value="1" data-am-ucheck> 男
                                    </label>
                                    <label class="am-radio-inline">
                                        <input type="radio" name="sex" value="2" data-am-ucheck> 女
                                    </label>
                                    <label class="am-radio-inline">
                                        <input type="radio" name="sex" value="3" data-am-ucheck> 保密
                                    </label>
                                </div>
                                <div class="sexs"></div>
                            </div>
                           
                            
                            {{csrf_field()}}
                            <div class="info-btn" >
                                <button class="am-btn am-btn-danger" id="tijiao">提交</button>
                            </div>
                    </form>
                    </div>
                </div>
            </div>
            <!--底部-->
            @include('layouts.home._foot')
        </div>
        <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
        <script>
        CPHONE = false;
        CNICK = false;
        CUNAME = false;
       
        //手机号
        $('input[name=phone]').blur(function() {

            var v = $('input[name=phone]').val();
            //正则
            var reg = /^1\d{10}$/;
            if (!reg.test(v)) {
                $('.phones').show().html('<center><span style="color:red;font-size:10px;" >请输入11位手机号</span><center/>');
                CPHONE = false;
            } else {
                $('.phones').show().html('<span style="color:green;font-size:12px;font-weight:bold">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;✔</span>');
                CPHONE = true;
            }
        })
        $('input[name=nickname]').blur(function() {

            var v = $('input[name=nickname]').val();
            //正则
            var reg = /^\S{1,20}$/;
            if (!reg.test(v)) {
                $('.nicknames').show().html('<center><span style="color:red;font-size:10px;" >昵称不能为空</span><center/>');
                CNICK = false;
            } else {
                $('.nicknames').show().html('<span style="color:green;font-size:12px;font-weight:bold">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;✔</span>');
                CNICK = true;
            }
        })
       
        
        //表单的提交事件
        $('form').submit(function(){
            $('input').trigger('blur');
            if(CPHONE && CNICK) {
                return true;
            }else{
                return false;
            }
        });
        </script>
    </div>
</body>

</html>