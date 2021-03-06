<div class="footer">
    <div class="footer-hd">
        <p>
            <center>
                @foreach($links as $v)
                <a href="http://{{$v->url}}">{{$v->name}}</a>
                <b>|</b> @endforeach
            </center>
        </p>
        </center>
    </div>
    <div class="footer-bd">
        <p>
            <center>
                <a href="/">关于好吃屋</a>
                <a href="#">合作伙伴</a>
                <a href="#">联系我们</a>
                <a href="#">网站地图</a>
                <em>© {{$setting['banquan']}} 版权所有</em>
            </center>
        </p>
    </div>
</div>
</div>
</div>
</div>
<!--菜单 -->
<div class=tip>
    <div id="sidebar">
        <div id="wrap">
            <div id="prof" class="item">
                <a href="/home/index">
                    <span class="setting"></span>
                </a>
                <div class="ibar_login_box status_login">
                    <div class="avatar_box">
                        @if(Session::has('homeUser'))
                        <p class="avatar_imgbox">
                            <img src="{{$user['image']}}" style="width:100px;">
                        </p>
                        <ul class="user_info">
                            <li>用户名:{{$user['nickname']}}</li>
                            @if($user['qx'] == '1')
                            </li>管理员</li>
                            @elseif($user['qx'] == '2')
                            <li>银牌会员</li>
                            @else
                            <li>金牌会员</li>
                            @endif
                        </ul>
                        @endif @if(!Session::has('homeUser'))
                        <ul class="user_info">
                            <li>用&nbsp;户&nbsp;名：请先登录!!</li>
                        </ul>
                        @endif
                    </div>
                    <div class="login_btnbox">
                        <a href="/home/dingdan" class="login_order">我的订单</a>
                        <a href="/home/collect" class="login_favorite">我的收藏</a>
                    </div>
                    <i class="icon_arrow_white"></i>
                </div>
            </div>
            <div id="shopCart" class="item">
                <a href="/shopcar">
                    <span class="message"></span>
                </a>
            </div>
            <div id="asset" class="item">
                <a href="/home/index">
                    <span class="view"></span>
                </a>
                <div class="mp_tooltip">
                    我的资产
                    <i class="icon_arrow_right_black"></i>
                </div>
            </div>
            <div id="foot" class="item">
                <a href="/home/foot">
                    <span class="zuji"></span>
                </a>
                <div class="mp_tooltip">
                    我的足迹
                    <i class="icon_arrow_right_black"></i>
                </div>
            </div>
            <div id="brand" class="item">
                <a href="/home/collect">
                    <span class="wdsc">
                        <img src="/home/images/wdsc.png" />
                    </span>
                </a>
                <div class="mp_tooltip">
                    我的收藏
                    <i class="icon_arrow_right_black"></i>
                </div>
            </div>
            <div class="quick_toggle">
                <li class="qtitem">
                    <a href="/home/yjfk"><span class="kfzx"></span></a>
                    <div class="mp_tooltip">
                        意见反馈
                        <i class="icon_arrow_right_black"></i>
                    </div>
                </li>
                <!--二维码 -->
                <li class="qtitem">
                    <a href="#none"><span class="mpbtn_qrcode"></span></a>
                    <div class="mp_qrcode" style="display:none;">
                        <img src="/home/images/guanzhu.png" />
                        <i class="icon_arrow_white"></i>
                    </div>
                </li>
                <li class="qtitem">
                    <a href="#top" class="return_top">
                        <span class="top"></span>
                    </a>
                </li>
            </div>
            <!--回到顶部 -->
            <div id="quick_links_pop" class="quick_links_pop hide"></div>
        </div>
    </div>
    <div id="prof-content" class="nav-content">
        <div class="nav-con-close">
            <i class="am-icon-angle-right am-icon-fw"></i>
        </div>
        <div>
            我
        </div>
    </div>
    <div id="shopCart-content" class="nav-content">
        <div class="nav-con-close">
            <i class="am-icon-angle-right am-icon-fw"></i>
        </div>
        <div>
            购物车
        </div>
    </div>
    <div id="asset-content" class="nav-content">
        <div class="nav-con-close">
            <i class="am-icon-angle-right am-icon-fw"></i>
        </div>
        <div>
            资产
        </div>
        <div class="ia-head-list">
            <a href="#" target="_blank" class="pl">
                <div class="num">0</div>
                <div class="text">优惠券</div>
            </a>
            <a href="#" target="_blank" class="pl">
                <div class="num">0</div>
                <div class="text">红包</div>
            </a>
            <a href="#" target="_blank" class="pl money">
                <div class="num">￥0</div>
                <div class="text">余额</div>
            </a>
        </div>
    </div>
    <div id="foot-content" class="nav-content">
        <div class="nav-con-close">
            <i class="am-icon-angle-right am-icon-fw"></i>
        </div>
        <div>
            足迹
        </div>
    </div>
    <div id="brand-content" class="nav-content">
        <div class="nav-con-close">
            <i class="am-icon-angle-right am-icon-fw"></i>
        </div>
        <div>
            收藏
        </div>
    </div>
    <div id="broadcast-content" class="nav-content">
        <div class="nav-con-close">
            <i class="am-icon-angle-right am-icon-fw"></i>
        </div>
        <div>
            充值
        </div>
    </div>
</div>
<script>
window.jQuery || document.write('<script src="/home/basic/js/jquery.min.js "><\/script>');
</script>
<script type="text/javascript " src="/home/basic/js/quick_links.js "></script>
<script>
setTimeout(function() {
    $('#xiaoshi').css('display', 'none');
}, 2000)
</script>
</body>

</html>