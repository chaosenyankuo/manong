<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">
    <title>福利中心</title>
    <link href="/home/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
    <link href="/home/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">
    <link href="/home/css/personal.css" rel="stylesheet" type="text/css">
    <link href="/home/css/cpstyle.css" rel="stylesheet" type="text/css">
    <script src="/home/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
    <script src="/home/AmazeUI-2.4.2/assets/js/amazeui.js"></script>
    <style>
    .youhui {
        border: solid 2px red;
    }

    #start {
        width: 100px;
        height: 50px;
        background-color: #fcc800;
        color: red;
        font-weight: bold;
        margin-left: 10px;
    }

    #stop {
        width: 100px;
        height: 50px;
        background-color: #fcc800;
        color: red;
        font-weight: bold;
        margin-left: 10px;
    }
    </style>
</head>

<body>
    <?php 
        use App\Link;
        use App\Setting;
        use App\User;
        $uid = \Session::get('id');
        $user = User::find($uid);
        $links = Link::all();
        $setting = Setting::first();
    ?>
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
                <li class="/"><a href="#">首页</a></li>
            </ul>
            <div class="nav-extra">
                <a href="/home/fuli" style="color:yellow"><i class="am-icon-user-secret am-icon-md nav-user"></i><b></b>福利中心</a>
                <i class="am-icon-angle-right" style="padding-left: 10px;"></i>
            </div>
        </div>
    </div>
    <b class="line"></b>
    <div class="center">
        <div class="col-main">
            <div class="main-wrap">
                <div class="user-coupon">
                    <!--标题 -->
                    <div class="am-cf am-padding">
                        <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">优惠券</strong> / <small>Coupon</small></div>
                    </div>
                    <hr/>
                    <div class="am-tabs-d2 am-tabs  am-margin" data-am-tabs>
                        <div class="am-tabs-bd">
                            <div class="am-tab-panel am-fade am-in am-active" id="tab1">
                                <div class="coupon-items">
                                    <div class="coupon-item coupon-item-d">
                                        <div class="coupon-list">
                                            <div class="c-type">
                                                <div class="c-class">
                                                    <strong>优惠券</strong>
                                                </div>
                                                <div class="c-price">
                                                    <strong id="name">0元优惠券</strong>
                                                </div>
                                                <div class="c-time"><span></span>适用于任何商品</div>
                                                <div class="c-type-top"></div>
                                                <div class="c-type-bottom"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <button id="start">点击立即抽奖</button>
                    @if(!empty($user->coupons[0]))
                    <script>
                        $('#start').click(function(){
                            alert('对不起,您已经参与过该活动了哦!!!');
                            $('#start').arrt('disabled','disabled');
                        })
                    </script>
                    @endif
                    <button id="stop" disabled='disabled'>点击停止</button>
                </div>
            </div>
            <meta name="csrf-token" content="{{csrf_token()}}">
            @if(empty($user->coupons[0]))
            <script>
            var start = $('#start');
            var stop = $('#stop');
            var coupons = ['5元优惠券', '5元优惠券','5元优惠券','5元优惠券','5元优惠券','5元优惠券','5元优惠券','5元优惠券','5元优惠券','5元优惠券','10元优惠券','10元优惠券','10元优惠券','10元优惠券','10元优惠券','10元优惠券','10元优惠券','10元优惠券', '15元优惠券','15元优惠券','15元优惠券','15元优惠券','15元优惠券', '15元优惠券','20元优惠券', '20元优惠券','20元优惠券','20元优惠券','25元优惠券', '25元优惠券','25元优惠券','30元优惠券', '35元优惠券', '50元优惠券', '80元优惠券', '100元优惠券'];
            var timer = [];
            start.click(function() {
                stop.removeAttr('disabled');
                timer.push(setInterval(function() {
                    var coupon = coupons[rand(0, coupons.length - 1)];
                    $('#name').text(coupon);
                }, 50));
            });
            function rand(m, n) {
                return Math.ceil(Math.random() * (n - m + 1)) + (m - 1);
            };
            stop.click(function() {
                start.attr('disabled', 'disabled');
                for (var i = 0; i < timer.length; i++) {
                    clearInterval(timer[i]);
                }
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var quan = $('#name').text();
                console.log(quan);
                $.ajax({
                    url: '/cunquan',
                    type: 'post',
                    data: { quan: quan},
                    success: function(data) {
                        if(data ==1 ){
                            alert('恭喜您,获得' + quan + '优惠券');
                        }else{
                            alert('抽奖失败');
                        }
                    },
                    async: true
                })
            });
            </script>
            @endif
            <!--底部-->
            @include('layouts.home._foot')
        </div>
        @include('layouts.home._menu')
    </div>
</body>

</html>