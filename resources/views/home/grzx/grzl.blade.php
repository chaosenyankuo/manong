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
                    <div class="user-infoPic">
                        <div class="filePic">
                            <input type="file" class="inputPic" name="image"allowexts="gif,jpeg,jpg,png,bmp" accept="image/*">
                            <img class="am-circle am-img-thumbnail" src="/home/images/getAvatar.do.jpg" alt="" />
                        </div>
                        <p class="am-form-help">头像</p>
                        <div class="info-m">
                        </div>
                    </div>
                    <!--个人信息 -->
                    <div class="info-main">
                        <form class="am-form am-form-horizontal" method="post" action="/home/grzl"enctype="multipart/form-data">
                            <div class="am-form-group">
                                <label for="user-name2" class="am-form-label">昵称</label>
                                <div class="am-form-content">
                                    <input type="text" id="user-name2" placeholder="nickname" name="nickname">
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label for="user-name" class="am-form-label">姓名</label>
                                <div class="am-form-content">
                                    <input type="text" id="user-name2" placeholder="name" name="uname">
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label class="am-form-label">性别</label>
                                <div class="am-form-content sex">
                                    <label class="am-radio-inline">
                                        <input type="radio" name="sex"  value="1" data-am-ucheck> 男
                                    </label>
                                    <label class="am-radio-inline">
                                        <input type="radio" name="sex" value="2" data-am-ucheck> 女
                                    </label>
                                    <label class="am-radio-inline">
                                        <input type="radio" name="sex" value="3" data-am-ucheck> 保密
                                    </label>
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label for="user-birth" class="am-form-label">生日</label>
                                <div class="am-form-content birth">
                                    <div class="birth-select">
                                        <select data-am-selected>
                                            <option value="a">2015</option>
                                            <option value="b">1987</option>
                                        </select>
                                        <em>年</em>
                                    </div>
                                    <div class="birth-select2">
                                        <select data-am-selected>
                                            <option value="a">12</option>
                                            <option value="b">8</option>
                                        </select>
                                        <em>月</em></div>
                                    <div class="birth-select2">
                                        <select data-am-selected>
                                            <option value="a">21</option>
                                            <option value="b">23</option>
                                        </select>
                                        <em>日</em></div>
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label for="user-phone" class="am-form-label">电话</label>
                                <div class="am-form-content">
                                    <input id="user-phone" value="{{Session::get('phone')}}" placeholder="telephonenumber" name="phone" type="tel">
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label for="user-email" class="am-form-label">电子邮件</label>
                                <div class="am-form-content">
                                    <input id="user-email" placeholder="Email" name="email" type="email"value="{{Session::get('email')}}">
                                </div>
                            </div>
                           	
                            {{csrf_field()}}
                            <div class="info-btn">
                                <button class="am-btn am-btn-danger">提交</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--底部-->
          @include('layouts.home._foot')
        </div>
        
    </div>
</body>

</html>