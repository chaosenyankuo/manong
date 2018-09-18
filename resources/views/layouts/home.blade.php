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
                @foreach($lunbotu as $v)
                <li class="banner1"><a><img src="{{$v->pic}}" title="{{$v->url}}" height="430" /></a></li>
                @endforeach
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
                    <a href="/home/fuli" style="color:yellow"><i class="am-icon-user-secret am-icon-md nav-user"></i>福利中心</a>
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
                                                                <a title="{{$vv->tname}}" href="/tags/{{$vv->id}}">
                                                                    <span>{{$vv -> tname}}</span>
                                                                </a>
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
            <!--走马灯 -->
            <div class="marqueen" style="height:418px;">
                <span class="marqueen-title">商城头条</span>
                <ul>
                    <li class="title-first" style="text-overflow:ellipsis;white-space:nowrap;overflow:hidden;width:188px;"><a target="_blank" href="{{$sctt[0]['scth_url']}}">
                                   
                                    <span>[特惠]</span style="text-overflow:ellipsis;white-space:nowrap;overflow:hidden;width:188px;">{{$sctt[0]['scth']}}                               
                                </a></li>
                    <li class="title-first" style="text-overflow:ellipsis;white-space:nowrap;overflow:hidden;width:188px;"><a target="_blank" href="{{$sctt[1]['scgg_url']}}">
                                    <span>[公告]</span>{{$sctt[1]['scgg']}}                                            
                                </a></li>
                </ul>
                <div class="mod-vip" style="padding:0px">
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
                    </div>
                    <ul style="height:160px;">
                        @foreach ($sctt as $v)
                        <li style=" text-overflow:ellipsis;white-space:nowrap;overflow:hidden;width:188px;"><a target="_blank" href="{{$v['scth_url']}}"><span>[特惠]</span>{{$v['scth']}}</a></li>
                        <li style="text-overflow:ellipsis;white-space:nowrap;overflow:hidden;width:188px;"><a target="_blank" href="{{$v['scgg_url']}}"><span>[公告]</span>{{$v['scgg']}}</a></li>
                        @endforeach
                    </ul>
                    <div style="width:200px;height:100px;">
                        <a href="/{{$v->id}}.html">
                            <img src="{{$cates[0]['cimage']}}" width="100"/>
                        </a>
                    </div>
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
                <div class="am-u-sm-3">
                    <img src="/home/2018-3.png"></img>
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
            @endforeach @include('layouts.home._foot')