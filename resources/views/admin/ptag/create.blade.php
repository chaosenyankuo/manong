@extends('layouts.admin') @section('title') 商品标签添加 @endsection @section('title','商品标签添加') @section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-action">
            带给你不一样的体验
        </div>
        <div class="card-content">
            <form class="col s12" action="/ptag" method="post">
                <div class="row">
                    <div class="input-field col s6">
                        <input id="first_name" name="ptname" type="text" class="validate">
                        <label for="first_name">商品标签名称</label>
                    </div>
                    <br>
                    <br>
                    <br>
                    <br> {{csrf_field()}}
                    <button class="waves-effect waves-light btn" style="margin-left:200px;">提交</button>
                </div>
        </div>
        </form>
        <div class="clearBoth"></div>
    </div>
</div>
<footer>
    <p>All right reserved. Template WebThemez.com. More Templates <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a></p>
</footer>
</div>
@endsection