<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">
    <title>评价管理</title>
    <link href="/home/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
    <link href="/home/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">
    <link href="/home/css/personal.css" rel="stylesheet" type="text/css">
    <link href="/home/css/cmstyle.css" rel="stylesheet" type="text/css">
    <script src="/home/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
    <script src="/home/AmazeUI-2.4.2/assets/js/amazeui.js"></script>
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
                <div class="user-comment">
                    <!--标题 -->
                    <div class="am-cf am-padding">
                        <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">评价管理</strong> / <small>Manage&nbsp;Comment</small></div>
                    </div>
                    <hr/>
                    <div class="am-tabs am-tabs-d2 am-margin" data-am-tabs>
                        <ul class="am-avg-sm-2 am-tabs-nav am-nav am-nav-tabs">
                            <li class="am-active"><a href="#tab1">所有评价</a></li>
                        </ul>
                        <div class="comment-top">
                            <div class="th th-price">
                                <td class="td-inner">评价</td>
                            </div>
                            <div class="th th-item">
                                <td class="td-inner">商品</td>
                            </div>
                        </div>
                        @foreach($comment as $v)
                        <div class="am-tabs-bd">
                            <div class="am-tab-panel am-fade am-in am-active" id="tab1">
                                <div class="comment-main">
                                    <div class="comment-list">
                                        <ul class="item-list">
                                            <li class="td td-item">
                                                <div class="item-pic">
                                                    <a href="#" class="J_MakePoint">
                                                        <img src="{{$v->shop->simage2}}" class="itempic">
                                                    </a>
                                                </div>
                                            </li>
                                            <li class="td td-comment">
                                                <div class="item-title">
                                                    <div class="item-opinion">好评</div>
                                                    <div class="item-name">
                                                        <a href="#">
                                                            <p class="item-basic-info">{{$v->shop->sname}}</p>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="item-comment">
                                                    {{$v['content']}}
                                                </div>
                                                <div class="item-info">
                                                    <div>
                                                        <p class="info-little"><span>口味：12#玛瑙</span> <span>包装：</span> </p>
                                                        <p class="info-time">{{$v['created_at']}}</p>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
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