<div class="footer center">
					<div class="footer-hd">

						<p>
						@foreach($links as $v)
							<a href="#">{{$v['name']}}</a>
						@endforeach
						</p>
					</div>
					<div class="footer-bd">
						<p>
							<a href="#">关于恒望</a>
							<a href="#">合作伙伴</a>
							<a href="#">联系我们</a>
							<a href="#">网站地图</a>

							<em>{{$setting['banquan']}}</em>
						</p>
					</div>
				</div>