@extends('layouts.admin')
@section('title') 商品评论标签修改
@endsection
@section('title','商品评论标签修改') 
@section('content')
<div class="col-lg-12">
    <div class="card ">
        <div class="card-content">
            <form class="col s12" action="/ptag/{{$ptag['id']}}" method="post">
                <div class="row">
                    <div class="center">
                        <label for="first_name">商品标签名称</label>
                        <br>
                        <input id="first_name" name="ptname" type="text" class="validate" style="width:300px; " value="{{$ptag['ptname']}}">
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
</div>
@endsection