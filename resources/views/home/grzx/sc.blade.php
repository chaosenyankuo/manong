
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

                    <div class="user-collection">
                        <!--标题 -->
                        <div class="am-cf am-padding">
                            <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">我的收藏</strong> / <small>My&nbsp;Collection</small></div>
                        </div>
                        <hr/>

                        <div class="you-like">
                            <div class="s-bar">
                                我的收藏
                                <a class="am-badge am-badge-danger am-round">降价</a>
                                <a class="am-badge am-badge-danger am-round">下架</a>
                            </div>
                            <div class="s-content">
                                <div class="s-item-wrap">
                                    <div class="s-item">

                                        <div class="s-pic">
                                            <a href="#" class="s-pic-link">
                                                <img src="/home/images/0-item_pic.jpg_220x220.jpg" alt="包邮s925纯银项链女吊坠短款锁骨链颈链日韩猫咪银饰简约夏配饰" title="包邮s925纯银项链女吊坠短款锁骨链颈链日韩猫咪银饰简约夏配饰" class="s-pic-img s-guess-item-img">
                                            </a>
                                        </div>
                                        <div class="s-info">
                                            <div class="s-title"><a href="#" title="包邮s925纯银项链女吊坠短款锁骨链颈链日韩猫咪银饰简约夏配饰">包邮s925纯银项链女吊坠短款锁骨链颈链日韩猫咪银饰简约夏配饰</a></div>
                                            <div class="s-price-box">
                                                <span class="s-price"><em class="s-price-sign">¥</em><em class="s-value">42.50</em></span>
                                                <span class="s-history-price"><em class="s-price-sign">¥</em><em class="s-value">68.00</em></span>
                                            </div>
                                            <div class="s-extra-box">
                                                <span class="s-comment">好评: 98.03%</span>
                                                <span class="s-sales">月销: 219</span>
                                            </div>
                                        </div>
                                        <div class="s-tp">
                                            <span class="ui-btn-loading-before">找相似</span>
                                            <i class="am-icon-shopping-cart"></i>
                                            <span class="ui-btn-loading-before buy">加入购物车</span>
                                            <p>
                                                <a href="javascript:;" class="c-nodo J_delFav_btn">取消收藏</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                              

                            </div>

                            <div class="s-more-btn i-load-more-item" data-screen="0"><i class="am-icon-refresh am-icon-fw"></i>更多</div>

                        </div>

                    </div>

                </div>
                @include('layouts.home._foot')
            </div>

        @include('layouts.home._menu')
        </div>

    </body>

</html>