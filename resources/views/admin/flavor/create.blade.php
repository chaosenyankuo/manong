@extends('layouts.admin') @section('title','商品口味添加') @section('title') 商品口味添加 @endsection @section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-content">
            <form class="col s12" action="/flavor" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="input-field col s3">
                        <label>口味名称</label>
                        <input type="text" name="fname" class="validate">
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