<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">
    <title>个人中心</title>
    <link href="/home/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
    <link href="/home/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">
    <link href="/home/css/personal.css" rel="stylesheet" type="text/css">
    <link href="/home/css/systyle.css" rel="stylesheet" type="text/css">
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
                <div class="wrap-left">
                    @section('content')
                    <div class="wrap-list">
                        <div class="m-user">
                            <!--个人信息 -->
                            <div class="m-bg"></div>
                            <div class="m-userinfo">
                                <div class="m-baseinfo">
                                    <a href="/home/grxx">

                                            <img src="{{$user['image']}}">

                                        </a>
                                    <em class="s-name">{{$user['nickname']}}<span class="vip1"></em>
                                    <div class="s-prestige am-btn am-round">
                                        @if($user->qx == '1') 管理员 @elseif($user->qx == '2') 银牌会员 @else 金牌会员 @endif
                                    </div>
                                   <span class="s-name">积分:{{$user['jifen']}}</span>
                                </div>
                                <div class="m-right">
                                    <div class="m-address">
                                        <a href="/home/shdz" class="i-trigger">我的收货地址</a>
                                    </div>
                                </div>
                            </div>
                            <!--个人资产-->
                            <div class="m-userproperty">
                                <div class="s-bar">
                                    <i class="s-icon"></i>个人资产
                                </div>
                                <p class="m-bonus">
                                    <a href="bonus.html">
                                            <i><img src="/home/images/bonus.png"/></i>
                                            <span class="m-title">红包</span>
                                            <em class="m-num">2</em>
                                        </a>
                                </p>
                                <p class="m-coupon">
                                    <a href="/home/coupon">
                                        <?php 
                                        use App\User;
                                        $uid = \Session::get('id');
                                        $user = User::findOrFail($uid);
                                        ?>
                                            <i><img src="/home/images/coupon.png"/></i>
                                            <span class="m-title">优惠券</span>
                                            <em class="m-num">{{count($user->coupons)}}</em>
                                        </a>
                                </p>
                                <p class="m-bill">
                                    <a href="bill.html">
                                            <i><img src="/home/images/wallet.png"/></i>
                                            <span class="m-title">钱包</span>
                                            <em class="m-num">2</em>
                                        </a>
                                </p>
                                <p class="m-big">
                                    <a href="#">
                                            <i><img src="/home/images/day-to.png"/></i>
                                            <span class="m-title">签到有礼</span>
                                        </a>
                                </p>
                                <p class="m-big">
                                    <a href="#">
                                            <i><img src="/home/images/72h.png"/></i>
                                            <span class="m-title">72小时发货</span>
                                        </a>
                                </p>
                            </div>
                        </div>
                        <div class="box-container-bottom"></div>
                        <!--订单 -->
                        <div class="m-order">
                            <div class="s-bar">
                                <i class="s-icon"></i>我的订单
                                <a class="i-load-more-item-shadow" href="/home/dingdan">全部订单</a>
                            </div>
                            <ul>
                                <li style="width:203.98px;">
                                    <a href="order.html"><i><img src="/home/images/pay.png"/></i>
                                        <span>待付款<em class="m-num">
                                            @if($dfks != 0)
                                                {{$dfks}}
                                            @endif
                                        </em></span>
                                    </a>
                                </li>
                                <li style="width:203.98px;">
                                    <a href="order.html"><i><img src="/home/images/send.png"/></i>
                                        <span>待发货<em class="m-num">
                                            @if($dfhs != 0)
                                                {{$dfhs}}
                                            @endif
                                        </em></span>
                                    </a>
                                </li>
                                <li style="width:203.98px;">
                                    <a href="order.html"><i><img src="/home/images/receive.png"/></i>
                                        <span>待收货<em class="m-num">
                                            @if($dshs != 0)
                                                {{$dshs}}
                                            @endif
                                        </em></span>
                                    </a>
                                </li>
                                <li style="width:203.98px;">
                                    <a href="order.html"><i><img src="/home/images/comment.png"/></i>
                                        <span>待评价<em class="m-num">
                                            @if($dpjs != 0)
                                                {{$dpjs}}
                                            @endif
                                        </em></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!--九宫格-->
                        <div class="user-patternIcon">
                            <div class="s-bar">
                                <i class="s-icon"></i>我的常用
                            </div>
                            <ul>
                                <a href="/home/home/shopcart.html">
                                    <li class="am-u-sm-4"><i class="am-icon-shopping-basket am-icon-md"></i><img src="/home/images/iconbig.png" />
                                        <p>购物车</p>
                                    </li>
                                </a>
                                <a href="collection.html">
                                    <li class="am-u-sm-4"><i class="am-icon-heart am-icon-md"></i><img src="/home/images/iconsmall1.png" />
                                        <p>我的收藏</p>
                                    </li>
                                </a>
                                <a href="/home/home/home.html">
                                    <li class="am-u-sm-4"><i class="am-icon-gift am-icon-md"></i><img src="/home/images/iconsmall0.png" />
                                        <p>为你推荐</p>
                                    </li>
                                </a>
                                <a href="comment.html">
                                    <li class="am-u-sm-4"><i class="am-icon-pencil am-icon-md"></i><img src="/home/images/iconsmall3.png" />
                                        <p>好评宝贝</p>
                                    </li>
                                </a>
                                <a href="foot.html">
                                    <li class="am-u-sm-4"><i class="am-icon-clock-o am-icon-md"></i><img src="/home/images/iconsmall2.png" />
                                        <p>我的足迹</p>
                                    </li>
                                </a>
                            </ul>
                        </div>
                        <!--收藏夹 -->
                        <div class="you-like">
                            <div class="s-bar">我的收藏
                            </div>
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
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="wrap-right">
                    <!-- 日历-->
                    <div class="day-list">
                        <div class="s-bar">
                            <a class="i-history-trigger s-icon" href="#"></a>我的日历
                            <a class="i-setting-trigger s-icon" href="#"></a>
                        </div>
                        <div class="s-care s-care-noweather">
                            <div class="s-date">
                                <em><?php $a = date('Y-m-d',time());
                                $b = explode('-',$a);
                                 print_r ($b[2]); ?></em>
                                <span><?php $weekarray=array("日","一","二","三","四","五","六"); 
                                    echo "星期".$weekarray[date("w")];
                                 ?></span>
                                <span><?php $a = date('Y.m',time());
                                print_r($a); ?></span>
                            </div>
                        </div>
                    </div>
                    <!--新品 -->
                    <div class="new-goods">
                        <div class="s-bar">
                            <i class="s-icon"></i>热卖推荐
                        </div>
                        @foreach($recoms as $v)
                        <div class="new-goods-info">
                            <a class="shop-info" href="/{{$v['id']}}.html" target="_blank">
                                <div class="face-img-panel">
                                    <img src="{{$v['simage']}}" alt="" width="80">
                                </div>
                                <span class="shop-title">{{$v['sname']}}</span>
                            </a>
                        </div>
                        @endforeach
                    </div>
                    @show
                </div>
            </div>
            <!--底部-->
            @include('layouts.home._foot')
        </div>
        @include('layouts.home._menu')
    </div>
    <!--引导 -->
    <div class="navCir">
        <li><a href="/home/home/home.html"><i class="am-icon-home "></i>首页</a></li>
        <li><a href="/home/home/sort.html"><i class="am-icon-list"></i>分类</a></li>
        <li><a href="/home/home/shopcart.html"><i class="am-icon-shopping-basket"></i>购物车</a></li>
        <li class="active"><a href="index.html"><i class="am-icon-user"></i>我的</a></li>
    </div>
</body>

</html>