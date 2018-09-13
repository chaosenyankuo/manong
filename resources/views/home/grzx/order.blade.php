<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">
    <title>订单管理</title>
    <link href="/home/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
    <link href="/home/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">
    <link href="/home/css/personal.css" rel="stylesheet" type="text/css">
    <link href="/home/css/orstyle.css" rel="stylesheet" type="text/css">
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
                <div class="user-order">
                    <!--标题 -->
                    <div class="am-cf am-padding">
                        <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">订单管理</strong> / <small>Order</small></div>
                    </div>
                    <hr/>
                    <div class="am-tabs am-tabs-d2 am-margin" data-am-tabs>
                        <ul class="am-avg-sm-5 am-tabs-nav am-nav am-nav-tabs">
                            <li class="am-active"><a href="#tab1">所有订单</a></li>
                            <li><a href="#tab2">待付款</a></li>
                            <li><a href="#tab3">待发货</a></li>
                            <li><a href="#tab4">待收货</a></li>
                            <li><a href="#tab5">待评价</a></li>
                        </ul>
                        <div class="am-tabs-bd">
                            <!-- 所有订单 -->
                            <div class="am-tab-panel am-fade am-in am-active" id="tab1">
                                @include('layouts.home._orderTop')
                                <div class="order-main">
                                    <div class="order-list">
                                        <!--交易成功-->
                                        @foreach($order1 as $k=>$v)
                                        <div class="order-status5">
                                            <div class="order-title">
                                                <div class="dd-num">订单编号：<a href="javascript:;">{{$v->order_bh}}</a></div>
                                                <span>成交时间：{{$v->created_at}}</span>
                                                <!--    <em>店铺：小桔灯</em>-->
                                            </div>
                                            <div class="order-content">
                                                <div class="order-left">
                                                    @foreach($v->shop as $kk=>$vv)
                                                    <ul class="item-list">
                                                        <li class="td td-item">
                                                            <div class="item-pic">
                                                                <a href="#" class="J_MakePoint">
																	<img src="{{$vv->simage}}" class="itempic J_ItemImg">
																</a>
                                                            </div>
                                                            <div class="item-info">
                                                                <div class="item-basic-info">
                                                                    <a href="#">
                                                                        <p>{{$vv->sname}}</p>
                                                                        <p class="info-little">颜色：12#川南玛瑙
                                                                            <br/>包装：裸装 </p>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="td td-price">
                                                            <div class="item-price">
                                                                {{$vv->sprice}}
                                                            </div>
                                                        </li>
                                                        <li class="td td-number">
                                                            <div class="item-number">
                                                                <span>×</span>{{$os1[$kk]->shuliang}}
                                                            </div>
                                                        </li>
                                                        <li class="td td-operation">
                                                            <div class="item-operation">
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    @endforeach
                                                </div>
                                                <div class="order-right">
                                                    <li class="td td-amount">
                                                        <div class="item-amount">
                                                            <?php $a=0; ?>
                                                            @foreach($v->order_shop as $kk=>$vv)
                                                                <?php $a += ($vv->shuliang)*($v->shop[$kk]->sprice)+10; ?>
                                                            @endforeach
                                                            合计：{{$a}}
                                                            <p>含运费：
                                                                <span>{{count($v->order_shop)}}0.00</span>
                                                            </p>
                                                        </div>
                                                    </li>
                                                    <div class="move-right">
                                                        <li class="td td-status">
                                                            <div class="item-status">
                                                                <p class="Mystatus">交易成功</p>
                                                                <p class="order-info"><a href="orderinfo.html">订单详情</a></p>
                                                                <p class="order-info"><a href="logistics.html">查看物流</a></p>
                                                            </div>
                                                        </li>
                                                        <li class="td td-change">
                                                            <div class="am-btn am-btn-danger anniu">
                                                                删除订单</div>
                                                        </li>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        <!--待付款-->
                                        @foreach($order2 as $k=>$v)
                                        <div class="order-status0">
                                            <div class="order-title">
                                                <div class="dd-num">订单编号：<a href="javascript:;">{{$v->order_bh}}</a></div>
                                                <span>成交时间：{{$v->created_at}}</span>
                                                <!--    <em>店铺：小桔灯</em>-->
                                            </div>
                                            <div class="order-content">
                                                <div class="order-left">
                                                    @foreach($v->shop as $kk=>$vv)
                                                    <ul class="item-list">
                                                        <li class="td td-item">
                                                            <div class="item-pic">
                                                                <a href="#" class="J_MakePoint">
																	<img src="{{$vv->simage}}" class="itempic J_ItemImg">
																</a>
                                                            </div>
                                                            <div class="item-info">
                                                                <div class="item-basic-info">
                                                                    <a href="#">
                                                                        <p>{{$vv->sname}}</p>
                                                                        <p class="info-little">颜色：12#川南玛瑙
                                                                            <br/>包装：裸装 </p>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="td td-price">
                                                            <div class="item-price">
                                                                {{$vv->sprice}}
                                                            </div>
                                                        </li>
                                                        <li class="td td-number">
                                                            <div class="item-number">
                                                                <span>×</span>{{$os2[$kk]->shuliang}}
                                                            </div>
                                                        </li>
                                                        <li class="td td-operation">
                                                            <div class="item-operation">
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    @endforeach
                                                </div>
                                                <div class="order-right">
                                                    <li class="td td-amount">
                                                        <div class="item-amount">
                                                            <?php $b=0; ?>
                                                            @foreach($v->order_shop as $kk=>$vv)
                                                                <?php $b += ($vv->shuliang)*($v->shop[$kk]->sprice)+10; ?>
                                                            @endforeach
                                                            合计：{{$b}}
                                                            <p>含运费：
                                                                <span>{{count($v->order_shop)}}0.00</span>
                                                            </p>
                                                        </div>
                                                    </li>
                                                    <div class="move-right">
                                                        <li class="td td-status">
                                                            <div class="item-status">
                                                                <p class="Mystatus">等待付款</p>
                                                                <p class="order-info">
                                                                    <a href="#">取消订单</a>
                                                                </p>
                                                            </div>
                                                        </li>
                                                        <li class="td td-change">
                                                            <a href="pay.html">
                                                                <div class="am-btn am-btn-danger anniu">
                                                                    一键支付</div>
                                                            </a>
                                                        </li>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        <!--待发货-->
                                        @foreach($order3 as $k=>$v)
                                        <div class="order-status2">
                                            <div class="order-title">
                                                <div class="dd-num">订单编号：<a href="javascript:;">{{$v->order_bh}}</a></div>
                                                <span>成交时间：{{$v->created_at}}</span>
                                                <!--    <em>店铺：小桔灯</em>-->
                                            </div>
                                            <div class="order-content">
                                                <div class="order-left">
                                                    @foreach($v->shop as $kk=>$vv)
                                                    <ul class="item-list">
                                                        <li class="td td-item">
                                                            <div class="item-pic">
                                                                <a href="#" class="J_MakePoint">
																	<img src="{{$vv->simage}}" class="itempic J_ItemImg">
																</a>
                                                            </div>
                                                            <div class="item-info">
                                                                <div class="item-basic-info">
                                                                    <a href="#">
                                                                        <p>{{$vv->sname}}</p>
                                                                        <p class="info-little">颜色：12#川南玛瑙
                                                                            <br/>包装：裸装 </p>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="td td-price">
                                                            <div class="item-price">
                                                                {{$vv->sprice}}
                                                            </div>
                                                        </li>
                                                        <li class="td td-number">
                                                            <div class="item-number">
                                                                <span>×</span>{{$os3[$kk]->shuliang}}
                                                            </div>
                                                        </li>
                                                        <li class="td td-operation">
                                                            <div class="item-operation">
                                                                <a href="refund.html">退款</a>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    @endforeach
                                                </div>
                                                <div class="order-right">
                                                    <li class="td td-amount">
                                                        <div class="item-amount">
                                                            <?php $c=0; ?>
                                                            @foreach($v->order_shop as $kk=>$vv)
                                                                <?php $c += ($vv->shuliang)*($v->shop[$kk]->sprice)+10; ?>
                                                            @endforeach
                                                            合计：{{$c}}
                                                            <p>含运费：
                                                                <span>{{count($v->order_shop)}}0.00</span>
                                                            </p>
                                                        </div>
                                                    </li>
                                                    <div class="move-right">
                                                        <li class="td td-status">
                                                            <div class="item-status">
                                                                <p class="Mystatus">买家已付款</p>
                                                                <p class="order-info"><a href="orderinfo.html">订单详情</a></p>
                                                            </div>
                                                        </li>
                                                        <li class="td td-change">
                                                            <div class="am-btn am-btn-danger anniu">
                                                                提醒发货</div>
                                                        </li>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        <!--待收货-->
                                        @foreach($order4 as $k=>$v)
                                        <div class="order-status3">
                                            <div class="order-title">
                                                <div class="dd-num">订单编号：<a href="javascript:;">{{$v->order_bh}}</a></div>
                                                <span>成交时间：{{$v->created_at}}</span>
                                                <!--    <em>店铺：小桔灯</em>-->
                                            </div>
                                            <div class="order-content">
                                                <div class="order-left">
                                                    @foreach($v->shop as $kk=>$vv)
                                                    <ul class="item-list">
                                                        <li class="td td-item">
                                                            <div class="item-pic">
                                                                <a href="#" class="J_MakePoint">
																	<img src="{{$vv->simage}}" class="itempic J_ItemImg">
																</a>
                                                            </div>
                                                            <div class="item-info">
                                                                <div class="item-basic-info">
                                                                    <a href="#">
                                                                        <p>{{$vv->sname}}</p>
                                                                        <p class="info-little">颜色：12#川南玛瑙
                                                                            <br/>包装：裸装 </p>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="td td-price">
                                                            <div class="item-price">
                                                                {{$vv->sprice}}
                                                            </div>
                                                        </li>
                                                        <li class="td td-number">
                                                            <div class="item-number">
                                                                <span>×</span>{{$os4[$kk]->shuliang}}
                                                            </div>
                                                        </li>
                                                        <li class="td td-operation">
                                                            <div class="item-operation">
                                                                <a href="refund.html">退款/退货</a>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    @endforeach
                                                </div>
                                                <div class="order-right">
                                                    <li class="td td-amount">
                                                        <div class="item-amount">
                                                            <?php $d=0; ?>
                                                            @foreach($v->order_shop as $kk=>$vv)
                                                                <?php $d += ($vv->shuliang)*($v->shop[$kk]->sprice)+10; ?>
                                                            @endforeach
                                                            合计：{{$d}}
                                                            <p>含运费：<span>{{count($v->order_shop)}}0.00</span></p>
                                                            
                                                        </div>
                                                    </li>
                                                    <div class="move-right">
                                                        <li class="td td-status">
                                                            <div class="item-status">
                                                                <p class="Mystatus">卖家已发货</p>
                                                                <p class="order-info"><a href="orderinfo.html">订单详情</a></p>
                                                                <p class="order-info"><a href="logistics.html">查看物流</a></p>
                                                                <p class="order-info"><a href="#">延长收货</a></p>
                                                            </div>
                                                        </li>
                                                        <li class="td td-change">
                                                            <div class="am-btn am-btn-danger anniu">
                                                                确认收货</div>
                                                        </li>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <!-- 代付款 -->
                            <div class="am-tab-panel am-fade" id="tab2">
                                @include('layouts.home._orderTop')
                                <div class="order-main">
                                    <div class="order-list">
                                        @foreach($order2 as $k=>$v)
                                        <div class="order-status1">
                                            <div class="order-title">
                                                <div class="dd-num">订单编号：<a href="javascript:;">{{$v->order_bh}}</a></div>
                                                <span>成交时间：{{$v->created_at}}</span>
                                                <!--    <em>店铺：小桔灯</em>-->
                                            </div>
                                            <div class="order-content">
                                                <div class="order-left">
                                                    @foreach($v->shop as $kk=>$vv)
                                                    <ul class="item-list">
                                                        <li class="td td-item">
                                                            <div class="item-pic">
                                                                <a href="#" class="J_MakePoint">
																	<img src="{{$vv->simage}}" class="itempic J_ItemImg">
																</a>
                                                            </div>
                                                            <div class="item-info">
                                                                <div class="item-basic-info">
                                                                    <a href="#">
                                                                        <p>{{$vv->sname}}</p>
                                                                        <p class="info-little">颜色：12#川南玛瑙
                                                                            <br/>包装：裸装 </p>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="td td-price">
                                                            <div class="item-price">
                                                                {{$vv->sprice}}
                                                            </div>
                                                        </li>
                                                        <li class="td td-number">
                                                            <div class="item-number">
                                                                <span>×</span>{{$os2[$kk]->shuliang}}
                                                            </div>
                                                        </li>
                                                        <li class="td td-operation">
                                                            <div class="item-operation">
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    @endforeach
                                                </div>
                                                <div class="order-right">
                                                    <li class="td td-amount">
                                                        <div class="item-amount">
                                                            <?php $e=0; ?>
                                                            @foreach($v->order_shop as $kk=>$vv)
                                                                <?php $e += ($vv->shuliang)*($v->shop[$kk]->sprice)+10; ?>
                                                            @endforeach
                                                            合计：{{$e}}
                                                            <p>含运费：
                                                                <span>{{count($v->order_shop)}}0.00</span>
                                                            </p>
                                                        </div>
                                                    </li>
                                                    <div class="move-right">
                                                        <li class="td td-status">
                                                            <div class="item-status">
                                                                <p class="Mystatus">等待买家付款</p>
                                                                <p class="order-info"><a href="#">取消订单</a></p>
                                                            </div>
                                                        </li>
                                                        <li class="td td-change">
                                                            <a href="pay.html">
                                                                <div class="am-btn am-btn-danger anniu">
                                                                    一键支付
                                                                </div>
                                                            </a>
                                                        </li>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <!-- 待发货 -->
                            <div class="am-tab-panel am-fade" id="tab3">
                                @include('layouts.home._orderTop')
                                <div class="order-main">
                                    <div class="order-list">
                                        @foreach($order3 as $k=>$v)
                                        <div class="order-status2">
                                            <div class="order-title">
                                                <div class="dd-num">订单编号：<a href="javascript:;">{{$v->order_bh}}</a></div>
                                                <span>成交时间：{{$v->created_at}}</span>
                                                <!--    <em>店铺：小桔灯</em>-->
                                            </div>
                                            <div class="order-content">
                                                <div class="order-left">
                                                    @foreach($v->shop as $kk=>$vv)
                                                    <ul class="item-list">
                                                        <li class="td td-item">
                                                            <div class="item-pic">
                                                                <a href="#" class="J_MakePoint">
																	<img src="{{$vv->simage}}" class="itempic J_ItemImg">
																</a>
                                                            </div>
                                                            <div class="item-info">
                                                                <div class="item-basic-info">
                                                                    <a href="#">
                                                                        <p>{{$vv->sname}}</p>
                                                                        <p class="info-little">颜色：12#川南玛瑙
                                                                            <br/>包装：裸装 </p>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="td td-price">
                                                            <div class="item-price">
                                                                {{$vv->sprice}}
                                                            </div>
                                                        </li>
                                                        <li class="td td-number">
                                                            <div class="item-number">
                                                                <span>×</span>{{$os3[$kk]->shuliang}}
                                                            </div>
                                                        </li>
                                                        <li class="td td-operation">
                                                            <div class="item-operation">
                                                                <a href="refund.html">退款</a>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    @endforeach
                                                </div>
                                                <div class="order-right">
                                                    <li class="td td-amount">
                                                        <div class="item-amount">
                                                            <?php $f=0; ?>
                                                            @foreach($v->order_shop as $kk=>$vv)
                                                                <?php $f += ($vv->shuliang)*($v->shop[$kk]->sprice)+10; ?>
                                                            @endforeach
                                                            合计：{{$f}}
                                                            <p>含运费：
                                                                <span>{{count($v->order_shop)}}0.00</span>
                                                            </p>
                                                        </div>
                                                    </li>
                                                    <div class="move-right">
                                                        <li class="td td-status">
                                                            <div class="item-status">
                                                                <p class="Mystatus">买家已付款</p>
                                                                <p class="order-info"><a href="orderinfo.html">订单详情</a></p>
                                                            </div>
                                                        </li>
                                                        <li class="td td-change">
                                                            <div class="am-btn am-btn-danger anniu">
                                                                提醒发货</div>
                                                        </li>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <!-- 待收货 -->
                            <div class="am-tab-panel am-fade" id="tab4">
                                @include('layouts.home._orderTop')
                                <div class="order-main">
                                    <div class="order-list">
                                        @foreach($order4 as $k=>$v)
                                        <div class="order-status3">
                                            <div class="order-title">
                                                <div class="dd-num">订单编号：<a href="javascript:;">{{$v->order_bh}}</a></div>
                                                <span>成交时间：{{$v->created_at}}</span>
                                                <!--    <em>店铺：小桔灯</em>-->
                                            </div>
                                            <div class="order-content">
                                                <div class="order-left">
                                                    @foreach($v->shop as $kk=>$vv)
                                                    <ul class="item-list">
                                                        <li class="td td-item">
                                                            <div class="item-pic">
                                                                <a href="#" class="J_MakePoint">
																	<img src="{{$vv->simage}}" class="itempic J_ItemImg">
																</a>
                                                            </div>
                                                            <div class="item-info">
                                                                <div class="item-basic-info">
                                                                    <a href="#">
                                                                        <p>{{$vv->sname}}</p>
                                                                        <p class="info-little">颜色：12#川南玛瑙
                                                                            <br/>包装：裸装 </p>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="td td-price">
                                                            <div class="item-price">
                                                                {{$vv->sprice}}
                                                            </div>
                                                        </li>
                                                        <li class="td td-number">
                                                            <div class="item-number">
                                                                <span>×</span>{{$os4[$kk]->shuliang}}
                                                            </div>
                                                        </li>
                                                        <li class="td td-operation">
                                                            <div class="item-operation">
                                                                <a href="refund.html">退款/退货</a>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    @endforeach
                                                </div>
                                                <div class="order-right">
                                                    <li class="td td-amount">
                                                        <div class="item-amount">
                                                            <?php $g=0; ?>
                                                            @foreach($v->order_shop as $kk=>$vv)
                                                                <?php $g += ($vv->shuliang)*($v->shop[$kk]->sprice)+10; ?>
                                                            @endforeach
                                                            合计：{{$g}}
                                                            <p>含运费：<span>{{count($v->order_shop)}}0.00</span></p>
                                                        </div>
                                                    </li>
                                                    <div class="move-right">
                                                        <li class="td td-status">
                                                            <div class="item-status">
                                                                <p class="Mystatus">卖家已发货</p>
                                                                <p class="order-info"><a href="orderinfo.html">订单详情</a></p>
                                                                <p class="order-info"><a href="logistics.html">查看物流</a></p>
                                                                <p class="order-info"><a href="#">延长收货</a></p>
                                                            </div>
                                                        </li>
                                                        <li class="td td-change">
                                                            <div class="am-btn am-btn-danger anniu">
                                                                确认收货</div>
                                                        </li>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <!-- 待评价 -->
                            <div class="am-tab-panel am-fade" id="tab5">
                                @include('layouts.home._orderTop')
                                <div class="order-main">
                                    <div class="order-list">
                                        @foreach($order1 as $k=>$v)
                                        <div class="order-status4">
                                            <div class="order-title">
                                                <div class="dd-num">订单编号：<a href="javascript:;">{{$v->order_bh}}</a></div>
                                                <span>成交时间：{{$v->created_at}}</span>
                                            </div>
                                            <div class="order-content">
                                                <div class="order-left">
                                                    @foreach($v->shop as $kk=>$vv)
                                                    <ul class="item-list">
                                                        <li class="td td-item">
                                                            <div class="item-pic">
                                                                <a href="#" class="J_MakePoint">
																	<img src="{{$vv->simage}}" class="itempic J_ItemImg">
																</a>
                                                            </div>
                                                            <div class="item-info">
                                                                <div class="item-basic-info">
                                                                    <a href="#">
                                                                        <p>{{$vv->sname}}</p>
                                                                        <p class="info-little">颜色：12#川南玛瑙
                                                                            <br/>包装：裸装 </p>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="td td-price">
                                                            <div class="item-price">
                                                                {{$vv->sprice}}
                                                            </div>
                                                        </li>
                                                        <li class="td td-number">
                                                            <div class="item-number">
                                                                <span>×</span>{{$os1[$kk]->shuliang}}
                                                            </div>
                                                        </li>
                                                        <li class="td td-operation">
                                                            <div class="item-operation">
                                                                <a href="refund.html"></a>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    @endforeach
                                                </div>
                                                <div class="order-right">
                                                    <li class="td td-amount">
                                                        <div class="item-amount">
                                                            <?php $h=0; ?>
                                                            @foreach($v->order_shop as $kk=>$vv)
                                                                <?php $h += ($vv->shuliang)*($v->shop[$kk]->sprice)+10; ?>
                                                            @endforeach
                                                            合计：{{$h}}
                                                            <p>含运费：
                                                                <span>{{count($v->order_shop)}}0.00</span>
                                                            </p>
                                                        </div>
                                                    </li>
                                                    <div class="move-right">
                                                        <li class="td td-status">
                                                            <div class="item-status">
                                                                <p class="Mystatus">交易成功</p>
                                                                <p class="order-info"><a href="orderinfo.html">订单详情</a></p>
                                                                <p class="order-info"><a href="logistics.html">查看物流</a></p>
                                                            </div>
                                                        </li>
                                                        <li class="td td-change">
                                                            <a href="/home/pjsp">
                                                                <div class="am-btn am-btn-danger anniu">
                                                                    评价商品</div>
                                                            </a>
                                                        </li>
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
                </div>
            </div>
            <!--底部-->
            @include('layouts.home._foot')
        </div>
        @include('layouts.home._menu')
    </div>
</body>

</html>