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
                    <form action="/home/plsp" method="post">
                    <div class="comment-main">
                    @foreach($shop as $v)
                        <div class="comment-list">
                            <div class="item-pic">
                                <a href="#" class="J_MakePoint">
										<img src="{{$v->simage}}" class="itempic">
									</a>
                            </div>
                            
                            <div class="item-title">
                                <div class="item-name">
                                    <a href="#">
                                        <p class="item-basic-info">{{$v->sname}}</p>
                                    </a>
                                </div>
                                <div class="item-info">
                                    <div class="info-little">
                                        <span>颜色：洛阳牡丹</span><br>
                                        <span>包装：裸装</span>
                                    </div>
                                    <div class="item-price">
                                        价格：<strong>{{$v->sprice}}</strong>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="clear"></div>
                            <div class="item-comment">
                                <textarea name="content[]" placeholder="请写下对宝贝的感受吧，对他人帮助很大哦！"></textarea>
                            </div>
                            <div class="item-opinion" name="haoping">
                                <li><i class="op1"type="radio" value="1"></i>好评</li>
                                <li><i class="op2"type="radio" value="2"></i>中评</li>
                                <li><i class="op3"type="radio" value="3"></i>差评</li>
                            </div>
                        </div>
                        <input type="hidden" name="shop_id[]" value="{{$v->id}}">
                        @endforeach
                        <!--多个商品评论-->
                        {{csrf_field()}}
                        <div class="info-btn">
                            <button class="am-btn am-btn-danger">发表评论</button>
                        </div>
                        </form>
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