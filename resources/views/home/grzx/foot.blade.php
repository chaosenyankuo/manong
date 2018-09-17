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
    <?php
    use App\Link;
    use App\Setting;
    use App\User;
    $uid = \Session::get('id');
    $user = null;
    if($uid !== null){
        $user = User::find($uid);
    }
    $links = Link::all();
    $setting = Setting::first();
    ?>
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
                    <li class="index"><a href="/">首页</a></li>
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
                        @if(Session::has('success'))
                        <div class="nav white" id="xiaoshi" style="margin-top: 10px;">
                            <center>
                                <p>
                                    <font style="color:red; font-size:20px;">{{Session::get('success')}}</font>
                                </p>
                            </center>
                        </div>
                        @endif
                        @if(Session::has('error'))
                        <div class="nav white" id="xiaoshi" style="margin-top: 10px;">
                            <center>
                                <p>
                                    <font style="color:red; font-size:20px;">{{Session::get('error')}}</font>
                                </p>
                            </center>
                        </div>
                        @endif
                        <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
                        <script>
                        setTimeout(function() {
                            $('#xiaoshi').css('display', 'none');
                        }, 2000);
                        </script>
                        <!--足迹列表 -->
                        @foreach($zuji as $v)
                        <div class="goods">
                            <div class="goods-box first-box">
                                <div class="goods-pic">
                                    <div class="goods-pic-box">
                                        <a class="goods-pic-link" target="_blank" href="/{{$v->shop->id}}.html" title="">
                                            <img src="{{$v->shop->simage}}" class="goods-img"></a>
                                    </div>
                                    <a class="goods-delete" href="/shanzuji?zuji_id={{$v['id']}}"><i class="am-icon-trash"></i></a>
                                </div>
                                <div class="goods-attr">
                                    <div class="good-title">
                                        <a class="title" href="/{{$v->shop->id}}.html" target="_blank">{{$v->shop->sname}}</a>
                                    </div>
                                    <center><span style="font-size:10px;">{{$v['updated_at']}}</span>
                                    </center>
                                    <div class="goods-price">
                                        <span class="g_price">  

                                        <span>¥</span><strong>{{$v->shop->sprice}}</strong>
                                        </span>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                        </div>
                        @endforeach
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