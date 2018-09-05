@extends('layouts.admin') 
@section('title') 友链添加 @endsection 
@section('title','友链添加') 

@section('content')
<div class="col-lg-12">
    <div class="card ">
        <div class="card-content">
            <form class="col s12" action="/link/{{$link['id']}}" method="post">
                <div class="row">
                    <div class="center">
                        <label for="first_name">友情链接名称</label>
                        <br>
                        <input id="first_name" name="name" type="text" class="validate" style="width:300px; " value="{{$link['name']}}">
                    </div>
                    <div class="center">
                        <label for="last_name">友情链接地址</label>
                        <br>
                        <input id="last_name" type="text" name="url" class="validate" style="width:300px; " value="{{$link['url']}}">
                        <br> {{method_field('PUT')}} {{csrf_field()}}
                        <button class="waves-effect waves-light btn" style="margin-left:200px;">修改</button>
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>
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