@extends('layouts.admin') @section('title','优惠券修改') @section('title') 优惠券修改 @endsection @section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-content">
            <form class="col s12" action="/coupon/{{$coupon['id']}}" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class=" col s3">
                        <label>名称</label>
                        <input type="text" name="name" class="validate" value="{{$coupon['name']}}">
                    </div>
                </div>
                <div class="row">
                    <div class=" col s3">
                        <label>面值</label>
                        <input type="text" name="price" class="validate" value="{{$coupon['price']}}">
                    </div>
                </div>
                {{csrf_field()}}
                {{method_field('PUT')}}
                <div class="left">
                    <button class="waves-effect waves-light btn">确认修改</button>
                </div>
            </form>
            <div class="clearBoth"></div>
        </div>
    </div>
</div>
@endsection