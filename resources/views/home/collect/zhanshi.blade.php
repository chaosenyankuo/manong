<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">
    <title>我的收藏</title>
    <link href="/home/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
    <link href="/home/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">
    <link href="/home/css/personal.css" rel="stylesheet" type="text/css">
    <link href="/home/css/colstyle.css" rel="stylesheet" type="text/css">
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
                <a href="/home/fuli" style="color:yellow"><i class="am-icon-user-secret am-icon-md nav-user"></i>福利中心</a>
                <i class="am-icon-angle-right" style="padding-left: 10px;"></i>
            </div>
        </div>
    </div>
    <b class="line"></b>
    <div class="center">
        <div class="col-main">
            <div class="main-wrap">
                <div class="user-collection">
                    <!--标题 -->
                    <div class="am-cf am-padding">
                        <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">我的收藏</strong> / <small>My&nbsp;Collection</small></div>
                    </div>
                    <hr/> @if(Session::has('success'))
                    <div class="nav white" id="xiaoshi" style="margin-top: 10px;">
                        <center>
                            <p>
                                <font style="color:red; font-size:20px;">{{Session::get('success')}}</font>
                            </p>
                        </center>
                    </div>
                    @endif @if(Session::has('error'))
                    <div class="nav white" id="xiaoshi" style="margin-top: 10px;">
                        <center>
                            <p>
                                <font style="color:red; font-size:20px;">{{Session::get('error')}}</font>
                            </p>
                        </center>
                    </div>
                    @endif
                    <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
                    <script>
                    setTimeout(function() {
                        $('#xiaoshi').css('display', 'none');
                    }, 2000);
                    </script>
                    <div class="you-like">
                        <div class="s-content">
                            @foreach($collects as $v)
                            <div class="s-item-wrap">
                                <div class="s-item">
                                    <div class="s-pic">
                                        <a href="/{{$v->shop->id}}.html" class="s-pic-link">
                                                <img src="{{$v->shop->simage}}" alt="商品图片" width="80" title=""" class="s-pic-img s-guess-item-img">
                                            </a>
                                    </div>
                                    <div class="s-info">
                                        <div class="s-title"><a href="/{{$v->shop->id}}.html">{{$v->shop->sname}}</a></div>
                                        <div class="s-price-box">
                                            <span class="s-price"><em class="s-price-sign">¥</em><em class="s-value">{{$v->shop->sprice}}</em></span>
                                            <a href="/home/delete?id={{$v['id']}}"><i class="am-icon-trash" style="float:right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
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