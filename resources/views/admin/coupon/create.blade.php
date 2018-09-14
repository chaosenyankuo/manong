@extends('layouts.admin') @section('title','优惠券添加') @section('title') 优惠券添加 @endsection @section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-content">
            <form class="col s12" action="/coupon" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="input-field col s3">
                        <label>优惠券名称</label>
                        <input type="text" name="name" class="validate">
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s3">
                        <label>优惠券面值</label>
                        <input type="text" name="price" class="validate">
                    </div>
                </div>
                {{csrf_field()}}
                <div class="left">
                    <button class="waves-effect waves-light btn">提交</button>
                </div>
            </form>
            <div class="clearBoth"></div>
        </div>
    </div>
</div>
@endsection