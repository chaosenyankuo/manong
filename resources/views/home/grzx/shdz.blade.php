<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">
    <title>地址管理</title>
    <link href="/home/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
    <link href="/home/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">
    <link href="/home/css/personal.css" rel="stylesheet" type="text/css">
    <link href="/home/css/addstyle.css" rel="stylesheet" type="text/css">
    <script src="/home/AmazeUI-2.4.2/assets/js/jquery.min.js" type="text/javascript"></script>
    <script src="/home/AmazeUI-2.4.2/assets/js/amazeui.js"></script>
    <!-- 地址 start -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="http://www.jq22.com/jquery/bootstrap-3.3.4.css" rel="stylesheet">
    <script src="http://www.jq22.com/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://www.jq22.com/jquery/bootstrap-3.3.4.js"></script>
    <script src="/dizhi/js/distpicker.data.js"></script>
    <script src="/dizhi/js/distpicker.js"></script>
    <script src="/dizhi/js/main.js"></script>
    <!-- 地址 end -->
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
                <li class="index"><a href="/">首页</a></li>
            </ul>
            <div class="nav-extra">
                <i class="am-icon-user-secret am-icon-md nav-user"></i><b></b>我的福利
                <i class="am-icon-angle-right" style="padding-left: 10px;"></i>
            </div>
        </div>
    </div>
    <b class="line"></b>
    <div class="center">
        <div class="col-main">
            <div class="main-wrap">
                <div class="user-address">
                    <!--标题 -->
                    <div class="am-cf am-padding">
                        <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">地址管理</strong> / <small>Address&nbsp;list</small></div>
                    </div>
                    <hr/>
                    @foreach($uaddress as $v)
                    <ul class="am-avg-sm-1 am-avg-md-3 am-thumbnails" style="width:255px;height:150px;margin-bottom:50px;margin-right:0px;margin-left:10px;float:left;" >
                        
                        <li class="user-addresslist">
                            <span class="new-option-r"><i class="am-icon-check-circle"></i>设为默认</span>
                            <p class="new-tit new-p-re">
                                <span class="new-txt">{{$v['name']}}</span>
                                <span class="new-txt-rd2">{{$v['uphone']}}</span>
                            </p>
                            <div class="new-mu_l2a new-p-re">
                                <p class="new-mu_l2cw">
                                    <span class="title">地址：</span>
                                    <span class="province">{{$v['address']}}</span>
                                <span class="street">{{$v['xadress']}}</span></p>
                            </div>
                            
                            <div class="new-addr-btn">
                                <a href="/home/dzedit/{{$v['id']}}"><i class="am-icon-edit"></i>编辑</a>
                                <span class="new-addr-bar">|</span>
                                <a href="/home/dzsc/{{$v['id']}}"><i class="am-icon-trash"></i>删除</a>
                            </div>
                        </li>
                      {{method_field('DELETE')}}
                    </ul>
                    @endforeach
                    @section('content')
                    <div class="clear"></div>
                        <a class="new-abtn-type" data-am-modal="{target: '#doc-modal-1', closeViaDimmer: 0}">添加新地址</a>
                        <!--例子-->
                        <div class="am-modal am-modal-no-btn" id="doc-modal-1">
                            <div class="add-dress">
                                <!--标题 -->
                                <div class="am-cf am-padding">
                                    <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">新增地址</strong> / <small>Add&nbsp;address</small></div>
                                </div>
                                <hr/>
                                <div class="am-u-md-12 am-u-lg-8" style="margin-top: 20px;">
                                    <form class="am-form am-form-horizontal" action="/home/shdz" method="post">
                                        <div class="am-form-group">
                                            <label for="user-name" class="am-form-label">收货人</label>
                                            <div class="am-form-content">
                                                <input type="text" id="user-name" name="name" placeholder="收货人">
                                            </div>
                                        </div>
                                        <div class="am-form-group">
                                            <label for="user-name" class="am-form-label">手机号</label>
                                            <div class="am-form-content">
                                                <input type="text" id="user-name" name="uphone" placeholder="手机号">
                                            </div>
                                        </div>
                                        <div class="am-form-group">
                                            <label for="user-address" class="am-form-label">收货地址</label>
                                            <div class="am-form-content address">
                                                <div class="input-field col s8">
                                                    <div data-toggle="distpicker">
                                                        <div class="form-group">
                                                            <select class="form-control" id="province1" name="sheng"></select>
                                                        </div>
                                                        <div class="form-group">
                                                            <select class="form-control" id="city1" name="shi"></select>
                                                        </div>
                                                        <div class="form-group">
                                                            <select class="form-control" id="district1" name="xian"></select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="am-form-group">
                                            <label for="user-intro" class="am-form-label">详细地址</label>
                                            <div class="am-form-content">
                                                <textarea class="" rows="3" name="xadress" id="user-intro" placeholder="输入详细地址"></textarea>
                                                <small>100字以内写出你的详细地址....</small>
                                            </div>
                                        </div>
                                        <div class="am-form-group">
                                            <div class="am-u-sm-9 am-u-sm-push-3">
                                                {{csrf_field()}}
                                                <button class="am-btn am-btn-danger">保存</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @show
                <script type="text/javascript">
                $(document).ready(function() {
                    $(".new-option-r").click(function() {
                        $(this).parent('.user-addresslist').addClass("defaultAddr").siblings().removeClass("defaultAddr");
                    });

                    var $ww = $(window).width();
                    if ($ww > 640) {
                        $("#doc-modal-1").removeClass("am-modal am-modal-no-btn")
                    }

                })
                </script>
                <div class="clear"></div>
            </div>
            <!--底部-->
            @include('layouts.home._foot')
        </div>
        @include('layouts.home._menu')
    </div>
</body>

</html>