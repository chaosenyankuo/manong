<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0 ,minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>结算页面</title>
    <link href="/home/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />
    <link href="/home/basic/css/demo.css" rel="stylesheet" type="text/css" />
    <link href="/home/css/cartstyle.css" rel="stylesheet" type="text/css" />
    <link href="/home/css/jsstyle.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/home/js/address.js"></script>
    <script type="text/javascript" src="/home/js/jquery.js"></script>
</head>

<body>
    <!--顶部导航条 -->
    <div class="am-container header">
        <ul class="message-l">
            <div class="topMessage">
                <div class="menu-hd">
                    <a href="#" target="_top" class="h">亲，请登录</a>
                    <a href="#" target="_top">免费注册</a>
                </div>
            </div>
        </ul>
        <ul class="message-r">
            <div class="topMessage home">
                <div class="menu-hd"><a href="#" target="_top" class="h">商城首页</a></div>
            </div>
            <div class="topMessage my-shangcheng">
                <div class="menu-hd MyShangcheng"><a href="#" target="_top"><i class="am-icon-user am-icon-fw"></i>个人中心</a></div>
            </div>
            <div class="topMessage mini-cart">
                <div class="menu-hd"><a id="mc-menu-hd" href="#" target="_top"><i class="am-icon-shopping-cart  am-icon-fw"></i><span>购物车</span><strong id="J_MiniCartNum" class="h">0</strong></a></div>
            </div>
            <div class="topMessage favorite">
                <div class="menu-hd"><a href="#" target="_top"><i class="am-icon-heart am-icon-fw"></i><span>收藏夹</span></a></div>
        </ul>
        </div>
        <!--悬浮搜索框-->
        <div class="nav white">
            <div class="logo"><img src="/home/images/logo.png" /></div>
            <div class="logoBig">
                <li><img src="/home/images/logobig.png" /></li>
            </div>
            <div class="search-bar pr">
                <a name="index_none_header_sysc" href="#"></a>
                <form>
                    <input id="searchInput" name="index_none_header_sysc" type="text" placeholder="搜索" autocomplete="off">
                    <input id="ai-topsearch" class="submit am-btn" value="搜索" index="1" type="submit">
                </form>
            </div>
        </div>
        <div class="clear"></div>
        <div class="concent">
            <!--地址 -->
            <div class="paycont">
                <div class="address">
                    <h3>确认收货地址 </h3>
                    <div class="control">
                        <a href="/home/shdz"><div class="tc-btn createAddr theme-login am-btn am-btn-danger">使用新地址</div></a>
                    </div>
                    <div class="clear"></div>
                    <ul>
                    	@foreach($uaddress as $v)
                            <div class="per-border"></div>
                            <li class="user-addresslist " >
                                <div class="address-left">
                                    <div class="user DefaultAddr">
                                        <span class="buy-address-detail">   
                       						<span class="buy-user a" >{{$v->name}}</span>
                                        	<span class="buy-phone b">{{$v->uphone}}</span>
                                        </span>
                                    </div>
                                    <div class="default-address DefaultAddr">
                                        <span class="buy-line-title buy-line-title-type">收货地址：</span>
                                        <span class="buy--address-detail">
        								    <span class="province c">{{explode('-',$v->address)[0]}}</span>
                                            <span class="city d">{{explode('-',$v->address)[1]}}</span>
                                            <span class="dist e">{{explode('-',$v->address)[2]}}</span>
                                            <span class="street f">{{$v->xadress}}</span>
                                        </span>
                                        </span>
                                    </div>
                                </div>
                                <div class="address-right">
                                    <a href="/home/person/address.html"><span class="am-icon-angle-right am-icon-lg"></span></a>
                                </div>
                                <div class="clear"></div>
                                <div class="new-addr-btn">
                                    <a href="#" class="hidden">设为默认</a>
                                    <span class="new-addr-bar hidden">|</span>
                                    <a href="/home/dzedit/{{$v->id}}">编辑</a>
                                    <span class="new-addr-bar">|</span>
                                    <a href="/home/dzsc/{{$v->id}}">删除</a>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <div class="clear"></div>
                </div>

                <script type="text/javascript">
                    $('.user-addresslist').click(function(){
                       
                        $(this).attr('id','nihao');
                        $(this).siblings().removeAttr('id');

                        
                    })
                </script>

                <!--物流 -->
                <div class="logistics">
                    <h3>选择物流方式</h3>
                    <ul class="op_express_delivery_hot">
                    	@foreach($wuliu as $v)
                        <li data-value="yuantong" class="OP_LOG_BTN  "><img src="{{$v->image}}" width=
                        "50" height="50" />{{$v->name}}<span></span></li>
                        @endforeach
                    </ul>

                </div>
                <div class="clear"></div>
                <!--支付方式-->
                <div class="logistics">
                    <h3>选择支付方式</h3>
                    <ul class="pay-list">
                    	@foreach($zhifu as $v)
                        <li class="pay card"><img src="{{$v->image}}" width="50" height="50" />{{$v->name}}<span></span></li>
                        @endforeach
                    </ul>
                </div>
                <div class="clear"></div>
                <!--订单 -->
                <div class="concent">
                    <div id="payTable">
                        <h3>确认订单信息</h3>
                        <div class="cart-table-th">
                            <div class="wp">
                                <div class="th th-item">
                                    <div class="td-inner">商品信息</div>
                                </div>
                                <div class="th th-price">
                                    <div class="td-inner">单价</div>
                                </div>
                                <div class="th th-amount">
                                    <div class="td-inner">数量</div>
                                </div>
                                <div class="th th-sum">
                                    <div class="td-inner">金额</div>
                                </div>
                                <div class="th th-oplist">
                                    <div class="td-inner">配送方式</div>
                                </div>
                            </div>
                        </div>
                        <div class="clear"></div>
                        <?php $a=0; ?>
                        @foreach($shop_id as $k => $v)
                            <tr class="item-list">
                                <div class="bundle  bundle-last">
                                    <div class="bundle-main">
                                        <ul class="item-content clearfix">
                                            <div class="pay-phone">
                                                <li class="td td-item">
                                                    <div class="item-pic">
                                                        <a href="#" class="J_MakePoint">
    														<img src="{{$shops[$v-1]->simage}}" width="100" class="itempic J_ItemImg">
    													</a>
                                                    </div>
                                                    <div class="item-info">
                                                        <div class="item-basic-info">
                                                            <a href="#" class="item-title J_MakePoint" data-point="tbcart.8.11">{{$shops[$v-1]->sname}}</a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="td td-info">
                                                    <div class="item-props">
                                                        <span class="sku-line">分类:{{$shopcar[$k]->flavor['fname']}}</span>
                                                        <span class="sku-line">包装:{{$shopcar[$k]->pack['pname']}} </span>
                                                    </div>
                                                </li>
                                                <li class="td td-price">
                                                    <div class="item-price price-promo-promo">
                                                        <div class="price-content">
                                                            <em class="J_Price price-now">￥{{$shops[$v-1]->sprice}}</em>
                                                        </div>
                                                    </div>
                                                </li>
                                            </div>
                                            <li class="td td-amount">
                                                <div class="amount-wrapper ">
                                                    <div class="item-amount ">
                                                        <span class="phone-title">购买数量</span>
                                                        <div class="sl">
                                                            <input class="text_box" name="" type="text" value="{{$shuliang}}" style="width:30px;" readonly />
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="td td-sum">
                                                <div class="td-inner">
                                                    <em tabindex="0" class="J_ItemSum number">￥{{$shuliang * $shops[$v-1]->sprice}}</em>
                                                </div>
                                            </li>
                                            <li class="td td-oplist">
                                                <div class="td-inner">
                                                    <span class="phone-title">配送方式</span>
                                                    <div class="pay-logis">
                                                        快递<b class="sys_item_freprice">10</b>元
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="clear"></div>
                                    </div>
                            </tr>
                            <?php $a += $shuliang * $shops[$v-1]->sprice; ?>
                        @endforeach
                        <div class="clear"></div>
                        </div>
                        </div>
                        <div class="clear"></div>
                        <div class="pay-total">
                            <!--留言-->
                            <div class="order-extra">
                                <div class="order-user-info">
                                    <div id="holyshit257" class="memo">
                                        <label>买家留言：</label>
                                        <input type="text" title="选填,对本次交易的说明（建议填写已经和卖家达成一致的说明）" placeholder="选填,建议填写和卖家达成一致的说明" class="memo-input J_MakePoint c2c-text-default memo-close">
                                        <div class="msg hidden J-msg">
                                            <p class="error">最多输入500个字符</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--优惠券 -->
                            <div class="buy-agio">
                                <li class="td td-coupon">
                                    <span class="coupon-title">优惠券</span>
                                    <select data-am-selected>
                                        <option value="a">
                                            <div class="c-price">
                                                <strong>￥8</strong>
                                            </div>
                                            <div class="c-limit">
                                                【消费满95元可用】
                                            </div>
                                        </option>
                                        <option value="b" selected>
                                            <div class="c-price">
                                                <strong>￥3</strong>
                                            </div>
                                            <div class="c-limit">
                                                【无使用门槛】
                                            </div>
                                        </option>
                                    </select>
                                </li>
                                <li class="td td-bonus">
                                    <span class="bonus-title">红包</span>
                                    <select data-am-selected>
                                        <option value="a">
                                            <div class="item-info">
                                                ¥50.00<span>元</span>
                                            </div>
                                            <div class="item-remainderprice">
                                                <span>还剩</span>10.40<span>元</span>
                                            </div>
                                        </option>
                                        <option value="b" selected>
                                            <div class="item-info">
                                                ¥50.00<span>元</span>
                                            </div>
                                            <div class="item-remainderprice">
                                                <span>还剩</span>50.00<span>元</span>
                                            </div>
                                        </option>
                                    </select>
                                </li>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <!--含运费小计 -->
                        <div class="buy-point-discharge ">
                            <p class="price g_price ">
                                合计（含运费） <span>¥</span><em class="pay-sum">{{$a+(count($shop_id)*10)}}</em>
                            </p>
                        </div>
                        <!--信息 -->
                        <div class="order-go clearfix">
                            <div class="pay-confirm clearfix">
                                <div class="box">
                                    <div tabindex="0" id="holyshit267" class="realPay"><em class="t">实付款：</em>
                                        <span class="price g_price ">
                                    <span>¥</span> <em class="style-large-bold-red " id="J_ActualFee">{{$a+(count($shop_id)*10)}}</em>
                                        </span>
                                    </div>
                                    <div id="holyshit268" class="pay-address">
                                        <p class="buy-footer-address">
                                            <span class="buy-line-title buy-line-title-type">寄送至：</span>
                                            <span class="buy--address-detail">
    								            <span class="province 1">湖北</span>省
                                                <span class="city 2">武汉</span>市
                                                <span class="dist 3">洪山</span>区
                                                <span class="street 4">雄楚大道666号(中南财经政法大学)</span>
                                            </span>
                                            </span>
                                        </p>
                                        <p class="buy-footer-address">
                                            <span class="buy-line-title">收货人：</span>
                                            <span class="buy-address-detail">   
                                         <span class="buy-user 5">艾迪 </span>
                                            <span class="buy-phone 6">15871145629</span>
                                            </span>
                                        </p>
                                    </div>
                                </div>
                                <script type="text/javascript">
                                    $('.user-addresslist').click(function(){
                                        $('.5').html($('#nihao .a').html());
                                        $('.6').html($('#nihao .b').html());
                                        $('.1').html($('#nihao .c').html());
                                        $('.2').html($('#nihao .d').html());
                                        $('.3').html($('#nihao .e').html());
                                        $('.4').html($('#nihao .f').html());
                                    });
                                </script>
                                <div id="holyshit269" class="submitOrder">
                                    <div class="go-btn-wrap">
                                        <a id="J_Go" href="#" class="btn-go" tabindex="0" title="点击此按钮，提交订单">提交订单</a>
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="footer">
                <div class="footer-hd">
                    <p>
                        @foreach($links as $v)
                        <a href="{{$v->url}}">{{$v->name}}</a>
                        <b>|</b>
                        @endforeach
                    </p>
                </div>
                <div class="footer-bd">
                    <p>
                        <a href="#">关于恒望</a>
                        <a href="#">合作伙伴</a>
                        <a href="#">联系我们</a>
                        <a href="#">网站地图</a>
                        <em>© 2015-2025 Hengwang.com 版权所有. 更多模板 <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a></em>
                    </p>
                </div>
            </div>
        </div>
        <div class="theme-popover-mask"></div>
</body>

</html>