@extends('layouts.admin') @section('title','分类添加') @section('title') 分类添加 @endsection @section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-content">
            <form class="col s12" action="/cate" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="input-field col s3">
                        <label>名称</label>
                        <input type="text" name="cname" class="validate">
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