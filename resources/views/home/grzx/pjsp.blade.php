<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">
    <title>发表评论</title>
    <link href="/home/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
    <link href="/home/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">
    <link href="/home/css/personal.css" rel="stylesheet" type="text/css">
    <link href="/home/css/appstyle.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="/home/js/jquery-1.7.2.min.js"></script>
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
                <div class="user-comment">
                    <!--标题 -->
                    <div class="am-cf am-padding">
                        <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">发表评论</strong> / <small>Make&nbsp;Comments</small></div>
                    </div>
                    <hr/>
                    <div class="comment-main">
                        <div class="comment-list">
                            <div class="item-pic">
                                <a href="#" class="J_MakePoint">
										<img src="/home/images/comment.jpg_400x400.jpg" class="itempic">
									</a>
                            </div>
                            <div class="item-title">
                                <div class="item-name">
                                    <a href="#">
                                        <p class="item-basic-info">美康粉黛醉美唇膏 持久保湿滋润防水不掉色</p>
                                    </a>
                                </div>
                                <div class="item-info">
                                    <div class="info-little">
                                        <span>颜色：洛阳牡丹</span>
                                        <span>包装：裸装</span>
                                    </div>
                                    <div class="item-price">
                                        价格：<strong>19.88元</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="clear"></div>
                            <div class="item-comment">
                                <textarea placeholder="请写下对宝贝的感受吧，对他人帮助很大哦！"></textarea>
                            </div>
                            <div class="item-opinion">
                                <li><i class="op1"></i>好评</li>
                                <li><i class="op2"></i>中评</li>
                                <li><i class="op3"></i>差评</li>
                            </div>
                        </div>
                        <!--多个商品评论-->
                        
                        <div class="info-btn">
                            <div class="am-btn am-btn-danger">发表评论</div>
                        </div>
                        <script type="text/javascript">
                        $(document).ready(function() {
                            $(".comment-list .item-opinion li").click(function() {
                                $(this).prevAll().children('i').removeClass("active");
                                $(this).nextAll().children('i').removeClass("active");
                                $(this).children('i').addClass("active");

                            });
                        })
                        </script>
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