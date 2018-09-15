<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">
    <title>优惠券</title>
    <link href="/home/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
    <link href="/home/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">
    <link href="/home/css/personal.css" rel="stylesheet" type="text/css">
    <link href="/home/css/cpstyle.css" rel="stylesheet" type="text/css">
    <script src="/home/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
    <script src="/home/AmazeUI-2.4.2/assets/js/amazeui.js"></script>
    <style>

    </style>
</head>

<body>
    <?php 
        use App\Link;
        use App\Setting;
        $links = Link::all();
        $setting = Setting::first();
    ?>
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
                <li class="/"><a href="#">首页</a></li>
            </ul>
            <div class="nav-extra">
                <a href="/home/fuli" style="color:yellow"><i class="am-icon-user-secret am-icon-md nav-user"></i><b></b>福利中心</a>
                <i class="am-icon-angle-right" style="padding-left: 10px;"></i>
            </div>
        </div>
    </div>
    <b class="line"></b>
    <div class="center">
        <div class="col-main">
            <div class="main-wrap">
                <div class="user-coupon">
                    <!--标题 -->
                    <div class="am-cf am-padding">
                        <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">优惠券</strong> / <small>Coupon</small></div>
                    </div>
                    <hr/>
                    <div class="am-tabs-d2 am-tabs  am-margin" data-am-tabs>
                        <div class="am-tabs-bd">
                            <div class="am-tab-panel am-fade am-in am-active" id="tab1">
                                <div class="coupon-items">
                                    @foreach($coupons as $v)
                                    <div class="coupon-item coupon-item-d">
                                        <div class="coupon-list">
                                            <div class="c-type">
                                                <div class="c-class">
                                                    <strong>购物券</strong>
                                                </div>
                                                <div class="c-price">
                                                    <strong>￥{{$v['price']}}</strong>
                                                </div>
                                                <div class="c-limit">
                                                    适用于任何产品
                                                </div>
                                                <div class="c-type-top"></div>
                                                <div class="c-type-bottom"></div>
                                            </div>
                                            <div class="c-msg">
                                                <div class="c-range">
                                                    <div class="range-all">
                                                        <div class="range-item">
                                                            <span class="label">券名：</span>
                                                            <span class="txt">{{$v['name']}}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="op-btns">
                                                    <a href="/" class="btn"><span class="txt">立即使用</span><b></b></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                </div>
            </div>
            <!--底部-->
            @include('layouts.home._foot')
        </div>
        @include('layouts.home._menu')
    </div>
</body>

</html>