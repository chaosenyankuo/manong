@extends('layouts.admin') @section('title') 支付管理 @endsection @section('title','支付管理') @section('content')
<div id="page-inner">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
               
                <div class="card-content">
                    <form class="col s12" method="post" action="/zhifu" enctype="multipart/form-data">
                       <div class="row" style="margin-left:300px">
                            <div class=" col s6">
                            <label for="first_name">合作公司</label>
                                <input  id="first_name" type="text" class="validate" name="name" >
                                
                            </div>
                        </div>                       
                       {{csrf_field()}}
                        <button class="waves-effect waves-light btn" style="margin-left:450px">提交</button>
                    </form>
                    <div class="clearBoth"></div>
                </div>
            </div>
        </div>
    </div>
   
</div>
@endsection