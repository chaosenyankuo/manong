<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>商品页面</title>
    <link href="/home/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css" />
    <link href="/home/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />
    <link href="/home/basic/css/demo.css" rel="stylesheet" type="text/css" />
    <link type="text/css" href="/home/css/optstyle.css" rel="stylesheet" />
    <link type="text/css" href="/home/css/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/social-share.js/1.0.16/css/share.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/social-share.js/1.0.16/js/social-share.min.js"></script>
    <script type="text/javascript" src="/home/basic/js/jquery-1.7.min.js"></script>
    <script type="text/javascript" src="/home/basic/js/quick_links.js"></script>
    <script type="text/javascript" src="/home/AmazeUI-2.4.2/assets/js/amazeui.js"></script>
    <script type="text/javascript" src="/home/js/jquery.imagezoom.min.js"></script>
    <script type="text/javascript" src="/home/js/jquery.flexslider.js"></script>
    <script type="text/javascript" src="/home/js/list.js"></script>
    <!-- 地址 -->
    <script src="http://www.jq22.com/jquery/bootstrap-3.3.4.js"></script>
    <script src="/dizhi/js/distpicker.data.js"></script>
    <script src="/dizhi/js/distpicker.js"></script>
    <script src="/dizhi/js/main.js"></script>
    <style>
    .height-10 {
        height: 10px;
    }
    </style>
</head>

<body>
    @include('layouts.home._top')
    <b class="line"></b>
    <div class="listMain">
        <!--分类-->
        <div class="nav-table">
            <div class="long-title"><span class="all-goods">全部分类</span></div>
            <div class="nav-cont">
                <ul>
                    <li class="index"><a href="/">首页</a>
                        <li>
                </ul>
                <div class="nav-extra">
                    <a href="/home/fuli" style="color:yellow"><i class="am-icon-user-secret am-icon-md nav-user"></i>福利中心</a>
                    <i class="am-icon-angle-right" style="padding-left: 10px;"></i>
                </div>
            </div>
        </div>
        @if(Session::has('error'))
        <div class="nav white" id="xiaoshi" style="margin-top: 10px;">
            <center>
                <p>
                    <font style="color:red; font-size:20px;">{{Session::get('error')}}</font>
                </p>
            </center>
        </div>
        @endif
        <ol class="am-breadcrumb am-breadcrumb-slash">
        </ol>
        <script type="text/javascript">
        $(function() {});
        $(window).load(function() {
            $('.flexslider').flexslider({
                animation: "slide",
                start: function(slider) {
                    $('body').removeClass('loading');
                }
            });
        });
        </script>
        <div class="scoll">
            <section class="slider">
                <div class="flexslider">
                    <ul class="slides">
                        <li>
                            <img src="/uploads/shopimages/1.jpg" title="pic" />
                        </li>
                        <li>
                            <img src="/uploads/shopimages/2.jpg" />
                        </li>
                        <li>
                            <img src="/uploads/shopimages/3.jpg" />
                        </li>
                    </ul>
                </div>
            </section>
        </div>
        <!--放大镜-->
        <div class="item-inform">
            <div class="clearfixLeft" id="clearcontent">
                <div class="box">
                    <script type="text/javascript">
                    $(document).ready(function() {
                        $(".jqzoom").imagezoom();
                        $("#thumblist li a").click(function() {
                            $(this).parents("li").addClass("tb-selected").siblings().removeClass("tb-selected");
                            $(".jqzoom").attr('src', $(this).find("img").attr("mid"));
                            $(".jqzoom").attr('rel', $(this).find("img").attr("big"));
                        });
                    });
                    </script>
                    <div class="tb-booth tb-pic tb-s310">
                        <img src="{{$shop['simage']}}" rel="{{$shop['simage']}}" alt="细节展示放大镜特效" class="jqzoom" />
                    </div>
                    <ul class="tb-thumb" id="thumblist">
                        <li class="tb-selected">
                            <div class="tb-pic tb-s40">
                                <a href="#"><img src="{{$shop['simage']}}" width="100" mid="{{$shop['simage']}}" big="{{$shop['simage']}}"></a>
                            </div>
                        </li>
                        <li class="tb">
                            <div class="tb-pic tb-s40">
                                <a href="#"><img src="{{$shop['simage1']}}" width="100" mid="{{$shop['simage1']}}" big="{{$shop['simage1']}}"></a>
                            </div>
                        </li>
                        <li class="tb">
                            <div class="tb-pic tb-s40">
                                <a href="#"><img src="{{$shop['simage2']}}" width="100" mid="{{$shop['simage2']}}" big="{{$shop['simage2']}}"></a>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="clear"></div>
            </div>
            <div class="clearfixRight">
                <!--规格属性-->
                <!--名称-->
                <div class="tb-detail-hd">
                    <h1>    
                        {{$shop['sname']}}
                    </h1>
                </div>
                <form action="/shopcar" method="post">
                    <div class="tb-detail-list">
                        <!--活动  -->
                        <div class="shopPromotion gold">
                            <div class="hot">
                                <dt class="tb-metatit">店铺优惠</dt>
                                <div class="gold-list">
                                    <p>该商品参与优惠券活动</p>
                                </div>
                            </div>
                            <div class="clear"></div>
                            <div class="coupon">
                            </div>
                        </div>
                        <!--价格-->
                        <div class="tb-detail-price">
                            <li class="price iteminfo_price">
                                <dt>促销价</dt>
                                <dd><em>¥</em><b class="sys_item_price">{{$shop['sprice']}}</b> </dd>
                                <input type="hidden" value="{{$shop['sprice']}}">
                            </li>
                            <li class="price iteminfo_mktprice">
                                <dt>原价</dt>
                                <dd><em>¥</em><b class="sys_item_mktprice">{{$shop['sprice']+10}}</b></dd>
                            </li>
                            <div class="clear"></div>
                        </div>
                        <br>
                        <div class="clear"></div>
                        <!--销量-->
                        <ul class="tm-ind-panel">
                            <li class="tm-ind-item tm-ind-sellCount canClick">
                                <div class="tm-indcon"><span class="tm-label">月销量</span><span class="tm-count">{{$shop['msales']}}</span></div>
                            </li>
                            <li class="tm-ind-item tm-ind-sumCount canClick">
                                <div class="tm-indcon"><span class="tm-label">累计销量</span><span class="tm-count">{{$shop['csales']}}</span></div>
                            </li>
                            <li class="tm-ind-item tm-ind-reviewCount canClick tm-line3">
                                <div class="tm-indcon"><span class="tm-label">累计评价</span><span class="tm-count">{{count($comment)}}</span></div>
                            </li>
                        </ul>
                        <div class="clear"></div>
                        <!--各种规格-->
                        <dl class="iteminfo_parameter sys_item_specpara">
                            <dt class="theme-login">
                                <div class="cart-title">可选规格<span class="am-icon-angle-right"></span></div>
                            </dt>
                            <dd>
                                <!--操作页面-->
                                <div class="theme-popover-mask"></div>
                                <div class="theme-popover">
                                    <div class="theme-span"></div>
                                    <div class="theme-poptit">
                                        <a href="javascript:;" title="关闭" class="close">×</a>
                                    </div>
                                    <div class="theme-popbod dform">
                                        <input type="hidden" name="shop_id" value="{{$shop['id']}}">
                                        <div class="theme-signin-left">
                                            <div class="theme-options">
                                                <div class="cart-title">口味</div>
                                                <ul class="flavor">&nbsp; 
                                                    @foreach($flavor as $v) 
                                                        @if(in_array($v->id,$shop->flavors->pluck('id')->toArray()))
                                                            <li class="sku-line">
                                                                <input type="hidden" value="{{$v['id']}}">{{$v['fname']}}
                                                            </li>
                                                        @endif 
                                                    @endforeach
                                                    <input type="hidden" name="flavor_id" value="" class="f">
                                                </ul>
                                            </div>
                                           
                                            <div class="theme-options">
                                                <div class="cart-title">包装</div>
                                                <ul class="pack_id">&nbsp; 
                                                    @foreach($pack as $v) 
                                                        @if(in_array($v->id,$shop->packs->pluck('id')->toArray()))
                                                            <li class="sku-line">
                                                                <input type="hidden" value="{{$v['id']}}">{{$v['pname']}}
                                                            </li>
                                                        @endif 
                                                    @endforeach
                                                    <input type="hidden" name="pack_id" value="" class="p">
                                                </ul>
                                            </div>
                                             <script type="text/javascript">
                                                $('.flavor > li').click(function(){
                                                    $(this).attr('id','flavor_id');
                                                    $(this).siblings().removeAttr('id');
                                                    $('.f').val($('#flavor_id > input').val());
                                                })
                                                $('.pack_id > li').click(function(){
                                                    $(this).attr('id','pack_id');
                                                    $(this).siblings().removeAttr('id');
                                                    $('.p').val($('#pack_id > input').val());
                                                })
                                            </script>
                                            <div class="theme-options">
                                                <div class="cart-title ">数量</div>
                                                <div class="height-10"></div>
                                                <dd>&nbsp;
                                                    <input id="min" value="-" style="text-align:center" />
                                                    <input id="text_box" name="shuliang" type="text" value="1" style="width:30px;" />
                                                    <input id="add" value="+" style="text-align:center" />
                                                    <span id="Stock" class="tb-hidden">库存<span class="stock">{{$shop['scount']}}</span>件</span>
                                                </dd>
                                                <script>
                                                $('input[name=shuliang]').change(function() {
                                                    var a = $('input[name=shuliang]').val();
                                                    if (a > {{$shop['scount']}}) {
                                                        alert('对不起,库存不足');
                                                        $('input[name=shuliang]').val({{$shop['scount']}});
                                                    };
                                                });
                                                </script>
                                            </div>
                                            <div class="clear"></div>
                                            <div class="btn-op">
                                                <div class="btn am-btn am-btn-warning">确认</div>
                                                <div class="btn close am-btn am-btn-warning">取消</div>
                                            </div>
                                        </div>
                                        <div class="theme-signin-right">
                                            <div class="img-info">
                                                <img src="/home/images/songzi.jpg" />
                                            </div>
                                            <div class="text-info">
                                                <span class="J_Price price-now">¥39.00</span>
                                                <span id="Stock" class="tb-hidden">库存<span class="stock">1000</span>件</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </dd>
                        </dl>
                        <div class="clear"></div>
                    </div>
                    {{csrf_field()}}
                    <div class="pay" style="position:relative;top:-80px;left:600px;">
                        <li>
                            <div class="clearfix theme-login">
                                <input title="加入购物车" type="submit" value="加入购物车" style="width:98px;border:1px solid #F03726;background-color:#F03726;color:white;height:35px;"><i></i>
                            </div>
                        </li>
                        <li>
                            <div class="clearfix tb-btn tb-btn-buy theme-login">
                                <a id="shou" title="点此按钮加入收藏夹" href="/home/cun?shop_id={{$shop['id']}}&&user_id={{session::get('homeUser')['id']}}" style="width:98px;border:1px solid #F03726;background-color:#F03726;color:white;height:35px;">加入收藏夹</a>
                                <div class="newsview" style="padding:50px;float:right">
                                    <div class="share-component" data-disabled="google,twitter,facebook" data-description="Share.js - 一键分享到微博，QQ空间，腾讯微博，人人，豆瓣"></div>
                                </div>
                            </div>
                        </li>
                    </div>
                    
                </form>

            </div>

            <div class="clear"></div>
        </div>
        <div class="clear"></div>
        <!-- introduce-->
        <div class="introduce">
            <div class="browse">
                <div class="mc">
                    <ul>
                        <div class="mt">
                            <h2>推荐推荐</h2>
                        </div>
                        @foreach($recom as $v)
                        <li>
                            <div class="p-img">
                                <a href="{{$v['id']}}.html"> <img class="" src="{{$v['simage']}}"> </a>
                            </div>
                            <div class="p-name"><a href="{{$v['id']}}.html">
                                        {{$v['sname']}}
                                    </a>
                            </div>
                            <div class="p-price"><strong>￥{{$v['sprice']}}</strong></div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="introduceMain">
                <div class="am-tabs" data-am-tabs>
                    <ul class="am-avg-sm-3 am-tabs-nav am-nav am-nav-tabs">
                        <li class="am-active">
                            <a href="#"><span class="index-needs-dt-txt">宝贝详情</span></a>
                        </li>
                        <li>
                            <a href="#"><span class="index-needs-dt-txt">全部评价</span></a>
                        </li>
                        <li>
                            <a href="#"><span class="index-needs-dt-txt">猜你喜欢</span></a>
                        </li>
                    </ul>
                    <div class="am-tabs-bd">
                        <div class="am-tab-panel am-fade am-in am-active">
                            <div class="J_Brand">
                                <div class="attr-list-hd tm-clear">
                                    <h4>产品参数：</h4></div>
                                <div class="clear"></div>
                                <ul id="J_AttrUL">
                                    <li title="">产品类型:&nbsp;{{$shop->cate->cname}}</li>
                                    <li title="">原料产地:&nbsp;{{$shop['yplace']}}</li>
                                    <li title="">产地:&nbsp;{{$shop['place']}}</li>
                                    <li title="">配料表:&nbsp;{{$shop['peiliao']}}</li>
                                    <li title="">产品规格:&nbsp;{{$shop['guige']}}</li>
                                    <li title="">产品标准号:&nbsp;{{$shop['biaozhun']}}</li>
                                    <li title="">生产日期：&nbsp;{{$shop['shengchan']}}</li>
                                    <li title="">保质期:&nbsp;{{$shop['date']}}</li>
                                    <li title="">储存方法：&nbsp;{{$shop['save']}}</li>
                                    <li title="">食用方法：&nbsp;{{$shop['eat']}}</li>
                                </ul>
                                <div class="clear"></div>
                            </div>
                            <div class="details">
                                <div class="attr-list-hd after-market-hd">
                                    <h4>商品细节</h4>
                                </div>
                                <div class="twlistNews">
                                    <img src="{{$shop['simage1']}}" style="height:400px;" width="100%" />
                                    <img src="{{$shop['simage2']}}" style="height:400px;" width="100%" />
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="am-tab-panel am-fade">
                            <div class="actor-new">
                                <div class="rate">
                                    <strong>{{$bilv}}<span>%</span></strong>
                                    <br> <span>好评度</span>
                                </div>
                                <dl>
                                    <dt>买家印象</dt>
                                    <dd class="p-bfc">
                                        @foreach($ptags as $k => $v)
                                        <q class="comm-tags">
                                            <span>{{$v['ptname']}}</span>
                                            <em>({{$cishu[$k]}})</em>
                                        </q>
                                        @endforeach
                                    </dd>
                                </dl>
                            </div>
                            <div class="clear"></div>
                            <div class="tb-r-filter-bar">
                                <ul class=" tb-taglist am-avg-sm-4">
                                    <li class="tb-taglist-li tb-taglist-li-current">
                                        <div class="comment-info">
                                            <span>全部评价</span>
                                            <span class="tb-tbcr-num">{{count($comment)}}</span>
                                        </div>
                                    </li>
                                    <li class="tb-taglist-li tb-taglist-li-1">
                                        <div class="comment-info">
                                            <span>好评</span>
                                            <span class="tb-tbcr-num">{{count($hao)}}</span>
                                        </div>
                                    </li>
                                    <li class="tb-taglist-li tb-taglist-li-0">
                                        <div class="comment-info">
                                            <span>中评</span>
                                            <span class="tb-tbcr-num">{{count($zhong)}}</span>
                                        </div>
                                    </li>
                                    <li class="tb-taglist-li tb-taglist-li--1">
                                        <div class="comment-info">
                                            <span>差评</span>
                                            <span class="tb-tbcr-num">{{count($cha)}}</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="clear"></div>
                            <ul class="am-comments-list am-comments-list-flip">
                                @foreach($comment as $v)
                                <li class="am-comment">
                                    <!-- 评论容器 -->
                                    <a href="">
                                                <img class="am-comment-avatar" src="{{$v->user->image}}" />
                                                <!-- 评论者头像 -->
                                            </a>
                                    <div class="am-comment-main">
                                        <!-- 评论内容容器 -->
                                        <header class="am-comment-hd">
                                            <!--<h3 class="am-comment-title">评论标题</h3>-->
                                            <div class="am-comment-meta">
                                                <!-- 评论元数据 -->
                                                <a href="#link-to-user" class="am-comment-author">{{$v->user->uname}}</a>
                                                <!-- 评论者 -->
                                                评论于
                                                <time datetime="">{{$v['created_at']}}</time>
                                                &nbsp;&nbsp;&nbsp;&nbsp; @if($v->com_id == '1')
                                                <span>好评</span> @endif @if($v->com_id == '2')
                                                <span>中评</span> @endif @if($v->com_id == '3')
                                                <span>差评</span> @endif
                                            </div>
                                        </header>
                                        <div class="am-comment-bd">
                                            <div class="tb-rev-item " data-id="255776406962">
                                                <div class="J_TbcRate_ReviewContent tb-tbcr-content ">
                                                    {{$v['content']}}
                                                </div>
                                                <div class="tb-r-act-bar">
                                                    <span style="font-size:8px;">商品口味：{{$v->flavor->fname}}</span>
                                                </div>
                                                <div class="tb-r-act-bar">
                                                    <span style="font-size:8px;">商品包装：{{$v->pack->pname}}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- 评论内容 -->
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                            <div class="clear"></div>
                            <style>
                            .pagination {
                                padding-left: 0;
                                margin: 1.5rem 0;
                                list-style: none;
                                color: #999;
                                text-align: left;
                                padding: 0;
                            }

                            .pagination li {
                                display: inline-block;
                            }

                            .pagination li a,
                            .pagination li span {
                                color: #23abf0;
                                border-radius: 3px;
                                padding: 6px 12px;
                                position: relative;
                                display: block;
                                text-decoration: none;
                                line-height: 1.2;
                                background-color: #fff;
                                border: 1px solid #ddd;
                                border-radius: 0;
                                margin-bottom: 5px;
                                margin-right: 5px;
                            }

                            .pagination li.active {
                                background-color: white;
                            }

                            .pagination .active span {
                                color: #23abf0;
                                border-radius: 3px;
                                padding: 6px 12px;
                                position: relative;
                                display: block;
                                text-decoration: none;
                                line-height: 1.2;
                                background-color: #fff;
                                border: 1px solid #ddd;
                                border-radius: 0;
                                margin-bottom: 5px;
                                margin-right: 5px;
                                background: #23abf0;
                                color: #fff;
                                border: 1px solid #23abf0;
                                padding: 6px 12px;
                            }
                            </style>
                            <!--分页 -->
                            {{$comments->links()}}
                            <div class="clear"></div>
                            <div class="tb-reviewsft">
                            </div>
                        </div>
                        <div class="am-tab-panel am-fade">
                            <div class="like">
                                <ul class="am-avg-sm-2 am-avg-md-3 am-avg-lg-4 boxes">
                                    @if(!empty($shop->cate) && !empty($shop->cate->shops())) @foreach($shop->cate->shops()->take(8)->get() as $v)
                                    <li>
                                        <a href="/{{$v['id']}}.html">
                                            <div class="i-pic limit">
                                                <img src="{{$v['simage']}}" style="width:215px;height:182px;" />
                                                <p>
                                                    <?php echo Mb_substr($v['sname'],0,10,'utf-8');?>
                                                </p>
                                                <p class="price fl">
                                                    <b>¥</b>
                                                    <strong>{{$v['sprice']}}</strong>
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    @endforeach @endif
                                </ul>
                            </div>
                            <div class="clear"></div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
                <meta name="csrf-token" content="{{csrf_token()}}">
                <script>
                setTimeout(function() {
                    $('#xiaoshi').css('display', 'none');
                }, 2000);
                $(window).load(function() {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    var shop_id = {{$shop['id']}};
                    $.ajax({
                        url: '/cunzuji',
                        type: 'post',
                        data: {shop_id: shop_id},
                        success: function(data) {

                        },
                        async: false
                    });
                });
                </script>
                @include('layouts.home._footer')