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
    @include('layouts.home._top') @if(Session::has('success'))
    <div class="nav white" id="xiaoshi">
        <center>
            <h1 style="color:red;font-size:30px;">{{Session::get('success')}}</h1></center>
    </div>
    @endif @if(Session::has('error'))
    <div class="nav white" id="xiaoshi">
        <center>
            <h1 style="color:red;font-size:30px;">{{Session::get('error')}}</h1></center>
    </div>
    @endif
    <script>
        setTimeout(function(){
            $('#xiaoshi').css('display','none');
        },2000)
    </script>
    <form action="/home/dingdan" method="post" class="tijiao">
        <div class="concent">
            {{csrf_field()}}
            <!--地址 -->
            <div class="paycont">
                <div class="address">
                    <h3>确认收货地址 </h3>
                    <div class="control">
                        <a href="/home/shdz">
                            <div class="tc-btn createAddr theme-login am-btn am-btn-danger">使用新地址</div>
                        </a>
                    </div>
                    <div class="clear"></div>
                    <ul>
                        @foreach($uaddress as $v)
                        <div class="per-border"></div>
                        <li class="user-addresslist ">
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
                                
                                <span class="new-addr-bar hidden">|</span>
                                <a href="/home/dzedit/{{$v->id}}">编辑</a>
                                <span class="new-addr-bar">|</span>
                                <a href="/home/dzsc/{{$v->id}}">删除</a>
                            </div>
                        </li>
                        <input type="hidden" class="132" value="{{$v->id}}" /> @endforeach
                    </ul>
                    <div class="clear"></div>
                </div>
                <script type="text/javascript">
                $('.user-addresslist').click(function() {

                    $(this).attr('id', 'nihao');
                    $(this).siblings().removeAttr('id');

                    $('#nihao + input').attr('name', 'uaddress_id');
                    $('#nihao + input').siblings().removeAttr('name');
                })
                </script>
                <!--物流 -->
                <div class="logistics">
                    <h3>选择物流方式</h3>
                    <ul class="op_express_delivery_hot">
                        @foreach($wuliu as $v)
                        <li data-value="yuantong" class="OP_LOG_BTN" style="height:42px;"><img src="{{$v->image}}" style="width:80px;height:42px;" />&nbsp;&nbsp;&nbsp;{{$v->name}}<span></span>
                            <input type="hidden" value="{{$v->id}}" />
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="clear"></div>
                <!--支付方式-->
                <div class="logistics">
                    <h3>选择支付方式</h3>
                    <ul class="pay-list">
                        @foreach($zhifu as $v)
                        <li class="pay card">
                            <img src="{{$v->image}}" style="width:80px;height:30px;" />&nbsp;&nbsp;&nbsp;{{$v->name}}<span></span>
                            <input type="hidden" value="{{$v->id}}" />
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="clear"></div>
                <script type="text/javascript">
                $('.op_express_delivery_hot > li').click(function() {
                    $(this).attr('id', 'wuliu');
                    $(this).siblings().removeAttr('id');
                    $('#wuliu > input').attr('name', 'wuliu_id');
                    $('#wuliu').siblings().removeAttr('name');
                    $('.m').val($('#wuliu > input').val());
                })
                $('.pay-list > li').click(function() {
                    $(this).attr('id', 'zhifu');
                    $(this).siblings().removeAttr('id');
                    $('#zhifu > input').attr('name', 'zhifu_id');
                    $('#zhifu').siblings().removeAttr('name');
                    $('.l').val($('#zhifu > input').val());
                })
                </script>
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
                        @foreach($shop_id as $k=>$v)
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
                                                    <span class="sku-line">口味:{{$shopcar[$k]->flavor['fname']}}</span>
                                                    <span class="sku-line">包装:{{$shopcar[$k]->pack['pname']}} </span>
                                                </div>
                                            </li>
                                            <li class="td td-price">
                                                <div class="item-price price-promo-promo">
                                                    <div class="price-content">
                                                        <em class="J_Price price-now">{{$shops[$v-1]->sprice}}</em>
                                                    </div>
                                                </div>
                                            </li>
                                        </div>
                                        <li class="td td-amount">
                                            <div class="amount-wrapper ">
                                                <div class="item-amount ">
                                                    <span class="phone-title">购买数量</span>
                                                    <div class="sl">
                                                        <input class="text_box" name="" type="text" value="{{$shuliang[$k]}}" style="width:30px;" readonly />
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="td td-sum">
                                            <div class="td-inner">
                                                <em tabindex="0" class="J_ItemSum number">{{$shuliang[$k] * $shops[$v-1]->sprice}}</em>
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
                        <input type="hidden" name="flavor_id[]" value="{{$shopcar[$k]->flavor['id']}}" />
                        <input type="hidden" name="pack_id[]" value="{{$shopcar[$k]->pack['id']}}" />
                        <input type="hidden" name="shop_id[]" value="{{$v}}" />
                        <input type="hidden" name="shuliang[]" value="{{$shuliang[$k]}}" />
                        <?php $a += $shuliang[$k] * $shops[$v-1]->sprice; ?> 
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
                                        <input type="text" title="选填,对本次交易的说明（建议填写已经和卖家达成一致的说明）" placeholder="选填,建议填写和卖家达成一致的说明" class="memo-input J_MakePoint c2c-text-default memo-close p" name="liuyan">
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
                                    <select data-am-selected name="yhj_1" class="yhj">
                                        <option value="0">不使用</option>
                                        @foreach($yhj as $v)
                                        <option value="{{$v->coupon->price}}">
                                            <div class="c-price">
                                                <strong>￥{{$v->coupon->price}}</strong>
                                            </div>
                                            <div class="c-limit">
                                                【{{$v->coupon->name}}】
                                            </div>
                                        </option>
                                        @endforeach
                                    </select>
                                </li>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <input type="hidden" name="jifen" value="" class="p"/>
                    </form>
                    <form action="/dingdan/pay" method="post" class="pay">
                        {{csrf_field()}}
                        <input type="hidden" value="" name="zongjia" class="z" />
                        <input type="hidden" name="uadd_id" value="" class="x" /> 
                        @foreach($shop_id as $k=>$v)
                        <input type="hidden" name="shop_id[]" value="{{$v}}" />
                        <input type="hidden" name="shuliang[]" value="{{$shuliang[$k]}}" /> 
                        <input type="hidden" name="flavor_id[]" value="{{$shopcar[$k]->flavor['id']}}" />
                        <input type="hidden" name="pack_id[]" value="{{$shopcar[$k]->pack['id']}}" />
                        @endforeach
                        <input type="hidden" name="wl_id" value="" class="m" />
                        <input type="hidden" name="zf_id" value="" class="l" />
                        <input type="hidden" name="liuyan" value="" class="k" />
                        <input type="hidden" name="jifen" value="" class="p"/>
                        <input type="hidden" name="yhj_1" value="" class="j" />
                    </form>
                    <!--含运费小计 -->
                    <div class="buy-point-discharge ">
                        <p class="price g_price ">
                            合计（含运费） <span>¥</span><em class="pay-sum 12">{{$a+(count($shop_id)*10)}}</em>
                        </p>
                    </div>
                    <script type="text/javascript">
                        $('.user-addresslist').click(function(){
                            $('.z').val($('.12').html()); //总价
                            $('.p').val({{$a}});
                            $('.x').val($('input[name=uaddress_id]').val());
                            $('.m').val($('input[name=wuliu_id]').val());
                            $('.l').val($('input[name=zhifu_id]').val());
                        })
                        $('.yhj').change(function(){
                            var zhi = {{$a+(count($shop_id)*10)}};
                            $('.12').html(zhi - $('.yhj').val());
                            $('#J_ActualFee').html(zhi - $('.yhj').val());
                            $('input[name=jifen]').val({{$a}});
                            $('.z').val($('.12').html()); //总价
                            $('.j').val($('.yhj').val());
                        })
                    </script>
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
                                                                <span class="province 1">XX</span>省
                                        <span class="city 2">XX</span>市
                                        <span class="dist 3">XX</span>区
                                        <span class="street 4">XXXXX</span>
                                        </span>
                                        </span>
                                    </p>
                                    <p class="buy-footer-address">
                                        <span class="buy-line-title">收货人：</span>
                                        <span class="buy-address-detail">   
                                            <span class="buy-user 5">XXX </span>
                                            <span class="buy-phone 6">phoneXXX</span>
                                        </span>
                                    </p>
                                </div>
                            </div>
                            <script type="text/javascript">
                            $('.user-addresslist').click(function() {
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
                                    <a id="J_Go" class="btn-go" tabindex="0" title="点击此按钮，提交订单">提交订单</a>
                                </div>
                            </div>
                            <script type="text/javascript">
                            $('#J_Go').click(function() {
                                var r = confirm('确认支付');
                                if (r == true) {
                                    $('.k').val($('.p').val());
                                    $('.pay').submit();
                                } else {
                                    $('.tijiao').submit();
                                }
                            })
                            </script>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
            <div class="clear"></div>
        </div>
    </div>
    @include('layouts.home._foot')
    </div>
<div class="theme-popover-mask"></div>
</body>

</html>