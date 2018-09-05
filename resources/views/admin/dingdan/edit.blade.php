@extends('layouts.admin') @section('title') 订单修改 @endsection @section('title','订单修改')
@section('content')
<div id="page-inner">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-content">
                    <form class="col s12" method="post" action="/dingdan/{{$dingdan['id']}}" enctype="multipart/form-data">
                     
                        <div class="row">
                            <div class=" col s6">
                                <label for="first_name">订单编号</label>
                                <input id="first_name" type="text" class="validate" name="order_bh" value="{{$dingdan['order_bh']}}">
                            </div>                          
                        </div>
                        <div class="row">
                            <div class=" col s6">
                                <div class="btn-group">
                                <label for="first_name">物流名称</label>
                                    <select data-toggle="dropdown" class="btn btn-primary dropdown-toggle" aria-expanded="true" name="wuliu_id"><span class="caret"></span>
                                        @foreach($wuliu as $v)
                                            <option value="{{$v['id']}}"
                                            @if($v['id']==$dingdan['wuliu_id'])
                                                selected
                                            @endif >
                                        {{$v['name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>                          
                        </div>
                        <div class="row">
                            <div class=" col s6">
                                <div class="btn-group">
                                <label for="first_name">支付方式</label>
                                    <select data-toggle="dropdown" class="btn btn-primary dropdown-toggle" aria-expanded="true" name="zhifu_id"><span class="caret"></span>
                                        @foreach($zhifu as $v)
                                            <option value="{{$v['id']}}"
                                            @if($v['id']==$dingdan['zhifu_id'])
                                                selected
                                            @endif >
                                        {{$v['name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>                          
                        </div>
                        <div class="row">
                            <div class=" col s6">
                                <label for="first_name">购物车id</label>
                                <input id="first_name" type="text" class="validate" name="shopcar_id" value="{{$dingdan['shopcar_id']}}">
                            </div>                          
                        </div>
                        <div class="row">
                            <div class=" col s6">
                                <label for="first_name">用户id</label>
                                <input id="first_name" type="text" class="validate" name="user_id" value="{{$dingdan['user_id']}}">
                            </div>                          
                        </div>
                        <div class="row">
                            <div class=" col s6">
                                <label for="first_name">商品id</label>
                                <input id="first_name" type="text" class="validate" name="shop_id" value="{{$dingdan['shop_id']}}">
                            </div>                          
                        </div>
                        <div class="row">
                            <div class=" col s6"> 
                            <label for="password">收货地址</label>
                            <textarea class="" name="uaddress_id" rows="5"> {{$dingdan['order_bh']}}</textarea>
                              
                               
                            </div>
                        </div>
                        
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                        <button class="waves-effect waves-light btn" style="margin-left:200px">修改</button>
                    </form>
                    <div class="clearBoth"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.col-lg-12 -->
    <footer>
        <p>All right reserved. Template WebThemez.com. More Templates <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a></p>&gt;</footer>
</div>
@endsection