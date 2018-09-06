@extends('layouts.admin') @section('title','好中差修改') @section('title') 好中差修改 @endsection @section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-content">
            <form class="col s12" action="/com/{{$com['id']}}" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class=" col s3">
                        <label>名称</label>
                        <input type="text" name="name" class="validate" value="{{$com['name']}}">
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