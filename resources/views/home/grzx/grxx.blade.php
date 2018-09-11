<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">
    <title>个人信息</title>
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
                <li class="index"><a href="/">首页</a></li>
            </ul>
            <div class="nav-extra">
                <i class="am-icon-user-secret am-icon-md nav-user"></i><b></b>我的福利
                <i class="am-icon-angle-right" style="padding-left: 10px;"></i>
            </div>
        </div>
    </div>
    <b class="line"></b>
    <div class="center">
        <div class="col-main">
            <div class="main-wrap">
                <div class="user-info">
                    <!--标题 -->
                    <div class="am-cf am-padding">
                        <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">个人资料</strong> / <small>Personal&nbsp;information</small></div>
                    </div>
                    <hr/>
                    <!--头像 -->
                    <form class="am-form am-form-horizontal" action="/home/xggrxx" method="post" enctype="multipart/form-data">
                    
                        <div class="filePic">
                            <input type="file" class="inputPic" name="image" allowexts="gif,jpeg,jpg,png,bmp" accept="image/*">
                            <img class="am-circle am-img-thumbnail" src="{{$users['image']}}" name="image" alt="" />
                        </div>
                        <p class="am-form-help">头像</p>
                       
                    
                    <!--个人信息 -->
                    <div class="info-main" style="padding: 0px 50px;">
                        
                            <div class="am-form-group">
                                <label for="user-name2" class="am-form-label">昵称</label>
                                <div class="am-form-content">
                                    <input type="text" id="user-name2" value="{{$users['nickname']}}" name="nickname">
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label class="am-form-label">性别</label>
                                <div class="am-form-content sex">
                                    <label class="am-radio-inline">
                                        <input type="radio" name="sex" value="1" data-am-ucheck
                                        @if($users['sex'] == 1)
                                        checked
                                        @endif
                                        > 男
                                    </label>
                                    <label class="am-radio-inline">
                                        <input type="radio" name="sex" value="2" data-am-ucheck
                                         @if($users['sex'] == 2)
                                        checked
                                        @endif
                                        > 女
                                    </label>
                                    <label class="am-radio-inline">
                                        <input type="radio" name="sex" value="3" data-am-ucheck
                                         @if($users['sex'] == 3)
                                        checked
                                        @endif> 保密
                                    </label>
                                </div>
                            </div>
                            
                            <div class="am-form-group">
                                <label for="user-phone" class="am-form-label">电话</label>
                                <div class="am-form-content">
                                    <input id="user-phone" name="phone" value="{{$users['phone']}}" type="tel">
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label for="user-email" class="am-form-label">电子邮件</label>
                                <div class="am-form-content">
                                    <input id="user-email" value="{{$users['email']}}" name="email" type="email">
                                </div>
                            </div>

                            {{csrf_field()}}
                            <div class="info-btn">
                                <button class="am-btn am-btn-danger">修改</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--底部-->
          @include('layouts.home._foot')
        </div>
        @include('layouts.home._menu')
    </div>
</body>

</html>