@extends('layouts.admin') @section('title') 合作公司修改 @endsection @section('title','合作公司修改') @section('content')
<div id="page-inner">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
               
                <div class="card-content">
                    <form class="col s12" method="post" action="/zhifu/{{$zhifu['id']}}" enctype="multipart/form-data">
                       <div class="row" style="margin-left:300px">
                            <div class=" col s6">
                            <label for="first_name">合作公司</label>
                                <input  id="first_name" type="text" class="validate" name="name" value="{{$zhifu['name']}}">
                                
                            </div>
                        </div>                       
                       {{csrf_field()}}
                       {{method_field('PUT')}}
                        <button class="waves-effect waves-light btn" style="margin-left:450px">提交</button>
                    </form>
                    <div class="clearBoth"></div>
                </div>
            </div>
        </div>
    </div>
   
    <!-- /.col-lg-12 -->
    
</div>
@endsection