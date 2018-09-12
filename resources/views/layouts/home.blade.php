<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>@yield('title')</title>
    <link href="/home/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />
    <link href="/home/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css" />
    <link href="/home/basic/css/demo.css" rel="stylesheet" type="text/css" />
    <link href="/home/css/hmstyle.css" rel="stylesheet" type="text/css" />
    <link href="/home/css/skin.css" rel="stylesheet" type="text/css" />
    <script src="/home/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
    <script src="/home/AmazeUI-2.4.2/assets/js/amazeui.min.js"></script>
</head>

<body>
    <div class="hmtop">
        <!--顶部导航条 -->
        @include('layouts.home._top')
    </div>
    <div class="banner">
        <!--轮播 -->
        <div class="am-slider am-slider-default scoll" data-am-flexslider id="demo-slider-0">
            <ul class="am-slides">
                <li class="banner1"><a><img src="/lunbo/likuo.jpg" height="430" /></a></li>
                <li class="banner2"><a><img src="/lunbo/sen.jpg" height="430" /></a></li>
                <li class="banner3"><a><img src="/lunbo/chao.jpg" height="430" /></a></li>
                <li class="banner4"><a><img src="/lunbo/wangyan.jpg" height="430" /></a></li>
            </ul>
        </div>
        <div class="clear"></div>
    </div>
    <div class="shopNav">
        <div class="slideall">
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
            <!--侧边导航 -->
            <div id="nav" class="navfull">
                <div class="area clearfix">
                    <div class="category-content" id="guide_2">
                        <div class="category">
                            <ul class="category-list" id="js_climit_li">
                                @foreach($cates as $v)
                                <li style="height:43.2px;" class="appliance js_toggle relative first">
                                    <div class="category-info">
                                        <h3 class="category-name b-category-name">
                                                    <i><img src="/home/images/cake.png"></i>
                                                    <a class="ml-22" title="{{$v->cname}}">{{$v->cname}}</a>
                                                </h3>
                                        <em>&gt;</em></div>
                                    <div class="menu-item menu-in top">
                                        <div class="area-in">
                                            <div class="area-bg">
                                                <div class="menu-srot">
                                                    <div class="sort-side">
                                                        <dl class="dl-sort" style="width:100%;">
                                                            <dt><span title="{{$v->cname}}">{{$v->cname}}</span></dt>
                                                            @foreach($tags as $vv) @if($vv->cate_id == $v->id)
                                                            <dd style="float:left;">
                                                                <a title="{{$vv->tname}}" href="#"><span>
                                                                            {{$vv -> tname}}
                                                                        </span></a>
                                                            </dd>
                                                            @endif @endforeach
                                                        </dl>
                                                    </div>
                                                    <div class="brand-side">
                                                        <dl class="dl-sort">
                                                            <dt><span>实力商家</span></dt>
                                                            @foreach($links as $vvv)
                                                            <dd><a rel="nofollow" title="{{$vvv->name}}" target="_blank" href="#" rel="nofollow"><span  class="red" >{{$vvv->name}}</span></a></dd>
                                                            @endforeach
                                                        </dl>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <b class="arrow"></b>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--轮播-->
            <script type="text/javascript">
            (function() {
                $('.am-slider').flexslider();
            });
            $(document).ready(function() {
                $("li").hover(function() {
                    $(".category-content .category-list li.first .menu-in").css("display", "none");
                    $(".category-content .category-list li.first").removeClass("hover");
                    $(this).addClass("hover");
                    $(this).children("div.menu-in").css("display", "block")
                }, function() {
                    $(this).removeClass("hover")
                    $(this).children("div.menu-in").css("display", "none")
                });
            })
            </script>
            <!--小导航 -->
            <div class="am-g am-g-fixed smallnav">
                <div class="am-u-sm-3">
                    <a href="sort.html">
                            <img src="/home/images/navsmall.jpg" />
                            <div class="title">商品分类</div>
                        </a>
                </div>
                <div class="am-u-sm-3">
                    <a href="#">
                            <img src="/home/images/huismall.jpg" />
                            <div class="title">大聚惠</div>
                        </a>
                </div>
                <div class="am-u-sm-3">
                    <a href="/home/index">
                            <img src="/home/images/mansmall.jpg" />
                            <div class="title">个人中心</div>
                        </a>
                </div>
                <div class="am-u-sm-3">
                    <a href="#">
                            <img src="/home/images/moneysmall.jpg" />
                            <div class="title">投资理财</div>
                        </a>
                </div>
            </div>
            <!--走马灯 -->
            <div class="marqueen">
                <div class="mod-vip">
                    @if(Session::has('nickname'))
                    <div class="m-baseinfo">
                        <a href="/home/index">
                            <img src="{{$user['image']}}">
                        </a>
                        <em>
                            Hi,<span class="s-name">{{$user['nickname']}}</span>
                            <a href="/home/index"><p>点击进入个人中心</p></a>                             
                        </em>
                    </div>
                    @endif @if(!Session::has('nickname'))
                    <div class="m-baseinfo">
                        <a href=" ">
                            <img src="/home/images/getAvatar.do.jpg">
                        </a>
                        <em>
                            <span class="s-name">请登录</span>
                        </em>
                    </div>
                    <div class="member-logout">
                        <a class="am-btn-warning btn" href="/home/login">登录</a>
                        <a class="am-btn-warning btn" href="/home/zhuce">注册</a>
                    </div>
                    @endif
                    <span class="marqueen-title">商城头条</span>
                    <div class="demo">
                        <ul>
                            <li class="title-first"><a target="_blank" href="#">
                                    <img src="/home/images/TJ2.jpg"></img>
                                    <span>[特惠]</span>商城爆品1分秒                                
                                </a></li>
                            <li class="title-first"><a target="_blank" href="#">

                                    <span>[公告]</span>商城与广州市签署战略合作协议
                                     <img src="/home/images/TJ.jpg"></img>
                                     <p>XXXXXXXXXXXXXXXXXX</p>
                                </a></li>
                            <div class="member-login">
                                <a href="#"><strong>0</strong>待收货</a>
                                <a href="#"><strong>0</strong>待发货</a>
                                <a href="#"><strong>0</strong>待付款</a>
                                <a href="#"><strong>0</strong>待评价</a>
                            </div>
                            <div class="clear"></div>
                    </div>
                    <li><a target="_blank" href="#"><span>[特惠]</span>洋河年末大促，低至两件五折</a></li>
                    <li><a target="_blank" href="#"><span>[公告]</span>华北、华中部分地区配送延迟</a></li>
                    <li><a target="_blank" href="#"><span>[特惠]</span>家电狂欢千亿礼券 买1送1！</a></li>
                    </ul>
                    <div class="advTip"><img src="/home/images/advTip.jpg" /></div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
        <script type="text/javascript">
        if ($(window).width() < 640) {
            function autoScroll(obj) {
                $(obj).find("ul").animate({
                    marginTop: "-39px"
                }, 500, function() {
                    $(this).css({
                        marginTop: "0px"
                    }).find("li:first").appendTo(this);
                })
            }

            $(function() {
                setInterval('autoScroll(".demo")', 3000);
            })
        }
        </script>
    </div>
    <div class="shopMainbg">
        <div class="shopMain" id="shopmain">
            <!--今日推荐 -->
            <div class="am-g am-g-fixed recommendation">
                <div class="clock am-u-sm-3">
                    <img src="/home/images/2016.png "></img>
                    <p>今日
                        <br>推荐</p>
                </div>
                @foreach($recom as $v)
                <div class="am-u-sm-4 am-u-lg-3 ">
                    <div class="info ">
                        <h3>{{$v -> sname}}</h3>
                        <h4>{{$v->cate->cname}}</h4>

                    </div>
                    <div class="recommendationMain one ">
                        <a href="/{{$v->id}}.html "><img src="{{$v -> simage}}" width="120" height="120"></img></a>
                    </div>

                </div>
                @endforeach
            </div>
            <div class="clear "></div>
            @foreach($cid as $k => $v)
            <div id="f{{$a++}}">
                <div class="am-container ">
                    <div class="shopTitle ">
                        <h4>{{$cates[$k] -> cname}}</h4>
                        <h3>{{$cates[$k] -> intro}}</h3>
                        <div class="today-brands ">
                            @foreach($cates[$k]->tags()->get() as $vv)
                            <a href="# ">{{$vv->tname}}</a> @endforeach
                        </div>
                        <span class="more ">
                            <a href="# ">更多美味<i class="am-icon-angle-right " style="padding-left:10px ; " ></i></a>
                        </span>

                    </div>
                </div>
                <div class="am-g am-g-fixed floodFour ">
                    <div class="am-u-sm-5 am-u-md-4 text-one list ">
                        <div class="word ">
                            @foreach($cates[$k]->tags()->take(6)->get() as $vv)
                            <a class="outer " href="# ">
                                <span class="inner ">
                                    <b class="text ">{{$vv->tname}}</b>
                                </span>
                            </a> @endforeach
                        </div>
                        <a href="# ">
                            <div class="outer-con ">
                                <div class="title ">{{$cates[$k] -> intro}}</div>
                            </div>
                            <img src="{{$cates[$k] -> cimage}}" />
                        </a>
                        <div class="triangle-topright "></div>
                    </div>
                    @foreach ($cates[$k]->shops()->take(8)->get() as $vv)
                    <div class="am-u-sm-7 am-u-md-4 text-two" style="float:left;">
                        <div class="outer-con ">
                            <div class="title ">
                                {{$vv->sname}}
                            </div>
                            <div class="sub-title ">
                                ¥{{$vv -> sprice}}
                            </div>
                            <i class="am-icon-shopping-basket am-icon-md seprate "></i>
                        </div>
                        <a href="/{{$vv->id}}.html"><img src="{{$vv->simage}}" /></a>
                    </div>
                    @endforeach
                </div>
                <div class="clear "></div>
            </div>
            @endforeach 
            @include('layouts.home._footer')