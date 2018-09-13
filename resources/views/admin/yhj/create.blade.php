@extends('layouts.admin') 
@section('title') 优惠劵添加 @endsection 
@section('title','优惠劵添加') 

@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-action">
            带给你不一样的体验
        </div>
        <div class="card-content">
            <form class="col s12" action="/yhj" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="input-field col s6">
                        <input id="first_name" name="yhj_pic" type="file" class="validate">
                        <label for="first_name">优惠劵图片</label>
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <div class="input-field col s6">
                        <input id="last_name" type="text" name="yhj_id" class="validate">
                        <label for="last_name">优惠劵码</label>
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <div class="input-field col s6">
                        <input id="last_name" type="text" name="yhj_pay" class="validate">
                        <label for="last_name">优惠金额</label>
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <div class="input-field col s6">
                        <input id="last_name" type="text" name="cycle" class="validate">
                        <label for="last_name">转盘转动次数</label>
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <div class="input-field col s6">
                        <input id="last_name" type="text" name="prize" class="validate">
                        <label for="last_name">中奖位置</label>
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>    
                    {{csrf_field()}}
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