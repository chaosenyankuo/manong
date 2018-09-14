
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

					<div class="user-address">
					@if(Session::has('error'))
						<center><div id="cuowu"class="duide" style="width:300px;height:50px; background:red;text-align:center;line-height:50px;color:white;font-size:16px;">
							{{Session::get('error')}}
						</div></center>
					@endif
					@if(Session::has('success'))
						<center><div id="cuowu"class="duide" style="width:300px;height:50px; background:#2196f3;text-align:center;line-height:50px;color:white;font-size:16px;">
							{{Session::get('success')}}
						</div></center>
					@endif
						<div class="clear"></div>
						<a class="new-abtn-type" data-am-modal="{target: '#doc-modal-1', closeViaDimmer: 0}">请位我们的网站留下您宝贵的意见</a>
						<!--例子-->
						<div class="am-modal am-modal-no-btn" id="doc-modal-1">

							<div class="add-dress">

								<!--标题 -->
								<div class="am-cf am-padding">
									<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">意见反馈</strong> / <small>Add&nbsp;address</small></div>
								</div>
								<hr/>

								<div class="am-u-md-12 am-u-lg-8" style="margin-top: 20px;">
									<form class="am-form am-form-horizontal" action='/home/yjfk' method="post">
										<div class="am-form-group">
											<label for="user-intro" class="am-form-label">意见箱</label>
											<div class="am-form-content">
												<textarea class="" name="content" rows="3" id="user-intro" placeholder="输入您的意见"></textarea>
												<small>请留下您宝贵的意见,我们会带给你更好的体验!!</small>
											</div>
										</div>
										{{csrf_field()}}
										<div class="am-form-group">
											<div class="am-u-sm-9 am-u-sm-push-3">
												<button class="am-btn am-btn-danger">保存</button>
											</div>
										</div>
									</form>
								</div>

							</div>

						</div>

					</div>

					<script type="text/javascript">
						$(document).ready(function() {							
							$(".new-option-r").click(function() {
								$(this).parent('.user-addresslist').addClass("defaultAddr").siblings().removeClass("defaultAddr");
							});
							
							var $ww = $(window).width();
							if($ww>640) {
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
<script>
    setTimeout(function() {
        $('.duide').css('display', 'none');
    }, 2000);
    </script>
	</body>

</html>