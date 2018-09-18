<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>搜索页面</title>
    <link href="/home/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />
    <link href="/home/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css" />
    <link href="home/basic/css/demo.css" rel="stylesheet" type="text/css" />
    <link href="home/css/seastyle.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="home/basic/js/jquery-1.7.min.js"></script>
    <script type="text/javascript" src="home/js/script.js"></script>
</head>

<body>
    <!--顶部导航条 -->
    <div class="am-container header">
        @include('layouts.home._top')
        <b class="line"></b>
        <div class="search">
            <div class="search-list">
                <div class="nav-table">
                    <div class="long-title"><span class="all-goods">全部分类</span></div>
                    <div class="nav-cont">
                        <ul>
                            <li class="index"><a href="/">首页</a></li>
                        </ul>
                        <div class="nav-extra">
                            <a href="/home/fuli" style="color:yellow"><i class="am-icon-user-secret am-icon-md nav-user"></i>福利中心</a>
                            <i class="am-icon-angle-right" style="padding-left: 10px;"></i>
                        </div>
                    </div>
                </div>
                <div class="am-g am-g-fixed">
                    <div class="am-u-sm-12 am-u-md-12">
                        <div class="theme-popover">
                        </div>
                        <div>
                            <ul class="am-avg-sm-2 am-avg-md-3 am-avg-lg-4 boxes">
                                @foreach($shops as $v)
                                <li>
                                    <div class="i-pic limit">
                                        <a href="/{{$v->id}}.html"> <img src="{{$v['simage']}}" /></a>
                                        <p class="title fl">{{$v['sname']}}</p>
                                        <p class="price fl">
                                            <b>¥</b>
                                            <strong>{{$v['sprice']}}</strong>
                                        </p>
                                        <p class="number fl">
                                            销量<span>{{$v['csales']}}</span>
                                        </p>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <!--分页 -->
                    </div>
                </div>
                @include('layouts.home._foot')
            </div>
        </div>
        <!--菜单 -->
        <script>
        window.jQuery || document.write('<script src="basic/js/jquery-1.9.min.js"><\/script>');
        </script>
        <script type="text/javascript" src="../basic/js/quick_links.js"></script>
        <div class="theme-popover-mask"></div>
    </div>
</body>

</html>
<SCRIPT Language=VBScript>
<!--

//-->
</SCRIPT>