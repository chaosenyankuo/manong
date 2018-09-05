@extends('layouts.admin') @section('title','标签修改') @section('title') 标签修改 @endsection @section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-content">
            <form class="col s12" action="/tag/{{$tag['id']}}" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class=" col s3">
                        <label>名称</label>
                        <input type="text" name="tname" class="validate" value="{{$tag['tname']}}">
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