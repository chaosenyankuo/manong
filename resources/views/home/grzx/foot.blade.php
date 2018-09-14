<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">
    <title>我的足迹</title>
    <link href="/home/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
    <link href="/home/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">
    <link href="/home/css/personal.css" rel="stylesheet" type="text/css">
    <link href="/home/css/footstyle.css" rel="stylesheet" type="text/css">
</head>

<body>
    <!--头 -->
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
                <a href="/home/fuli" style="color:yellow"><i class="am-icon-user-secret am-icon-md nav-user"></i>福利中心</a>
                <i class="am-icon-angle-right" style="padding-left: 10px;"></i>
            </div>
        </div>
    </div>
    <b class="line"></b>
    <div class="center">
        <div class="col-main">
            <div class="main-wrap">
                <div class="user-foot">
                    <!--标题 -->
                    <div class="am-cf am-padding">
                        <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">我的足迹</strong> / <small>Browser&nbsp;History</small></div>
                    </div>
                    <hr/>
                    <!--足迹列表 -->
                    <div class="goods">
                        <div class="goods-box first-box">
                            <div class="goods-pic">
                                <div class="goods-pic-box">
                                    <a class="goods-pic-link" target="_blank" href="#" title="意大利费列罗进口食品巧克力零食24粒  进口巧克力食品">
											<img src="/home/images/TB1_pic.jpg_200x200.jpg" class="goods-img"></a>
                                </div>
                                <a class="goods-delete" href="javascript:void(0);"><i class="am-icon-trash"></i></a>
                                <div class="goods-status goods-status-show"><span class="desc">宝贝已下架</span></div>
                            </div>
                            <div class="goods-attr">
                                <div class="good-title">
                                    <a class="title" href="#" target="_blank">意大利费列罗进口食品巧克力零食24粒  进口巧克力食品</a>
                                </div>
                                <div class="goods-price">
                                    <span class="g_price">                                    
                                        <span>¥</span><strong>71</strong>
                                    </span>
                                    <span class="g_price g_price-original">                                    
                                        <span>¥</span><strong>142</strong>
                                    </span>
                                </div>
                                <div class="clear"></div>
                                <div class="goods-num">
                                    <div class="match-recom">
                                        <a href="#" class="match-recom-item">找相似</a>
                                        <a href="#" class="match-recom-item">找搭配</a>
                                        <i><em></em><span></span></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <!--底部-->
            @include('layouts.home._foot')
        </div>
        @include('layouts.home._menu')
    </div>
</body>

</html>