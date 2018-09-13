@extends('layouts.admin') 
@section('title') 优惠劵修改 @endsection 
@section('title','优惠劵修改') 

@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-action">
            带给你不一样的体验
        </div>
        <div class="card-content">
            <form class="col s12" action="/yhj/{{$yhj['id']}}" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="input-field col s6">
                        <input id="first_name" name="yhj_pic" type="file" class="validate" value="{{$yhj['yhj_pic']}}">
                        <label for="first_name">优惠劵图片</label>
                    </div>
                  
                    <div class=" col s5">
                    <label for="last_name">优惠劵码</label>
                        <input id="last_name" type="text" name="yhj_id" class="validate" value="{{$yhj['yhj_id']}}">
                        
                    </div>
                   
                    <div class=" col s5">
                      <label for="last_name">优惠金额</label>
                        <input id="last_name" type="text" name="yhj_pay" class="validate" value="{{$yhj['yhj_pay']}}">
                      
                    </div>
                    
                    <div class=" col s5">
                    <label for="last_name">转盘转动次数</label>
                        <input id="last_name" type="text" name="cycle" class="validate" value="{{$yhj['cycle']}}">
                        
                    </div>
                    
                    <div class=" col s5">
                    <label for="last_name">中奖位置</label>
                        <input id="last_name" type="text" name="prize" class="validate" value="{{$yhj['prize']}}">
                        
                    </div>
                   
                    {{csrf_field()}}{{method_field('PUT')}}
                    <button class="waves-effect waves-light btn" style="margin-left:200px;">提交</button>
                </div>
        </div>
        </form>
        <div class="clearBoth"></div>
    </div>
</div>
<footer>
   
</footer>
</div>
@endsection