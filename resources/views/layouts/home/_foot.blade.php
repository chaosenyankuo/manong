<div class="footer ">
    <div class="footer-hd ">
        <p>
            <center>
                @foreach($links as $v)
                <a href="http://{{$v['url']}}">{{$v['name']}}</a> @endforeach
            </center>
        </p>
    </div>
    <div class="footer-bd ">
        <p>
            <center>
                <a href="/">关于好吃屋</a>
                <a href="# ">合作伙伴</a>
                <a href="# ">联系我们</a>
                <a href="# ">网站地图</a>
                <em>© {{$setting['banquan']}} 版权所有</em>
            </center>
        </p>
    </div>
</div>