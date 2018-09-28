@extends('layouts.admin') @section('title') 订单修改 @endsection @section('title','订单修改')
@section('content')
<div id="page-inner">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-content">
                    <form class="col s12" method="post" action="/dingdan/{{$os['id']}}" enctype="multipart/form-data">
                     
                        <div class="row">
                            <div class=" col s6">
                                <label for="first_name">订单编号</label>
                                <input id="first_name" type="text" class="validate" name="order_bh" value="{{$os['order_bh']}}" readonly>
                            </div>      
                            <div class=" col s3">
                                <label for="first_name">商品名</label>
                                <input id="first_name" type="text" class="validate" name="shop_id" value="{{$os->shop->sname}}" readonly>
                            </div>
                            <div class=" col s3">
                                <label for="first_name">商品数量</label>
                                <input id="first_name" type="text" class="validate" name="shuliang" value="{{$os->shuliang}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col s6">
                                <div class="btn-group">
                                <label for="first_name">物流名称</label>
                                    <select data-toggle="dropdown" class="btn btn-primary dropdown-toggle" aria-expanded="true" name="wuliu_id"><span class="caret"></span>
                                        @foreach($wuliu as $v)
                                            <option value="{{$v['id']}}"
                                            @if($v['id']==$os->order->wuliu_id)
                                                selected
                                            @endif >
                                        {{$v['name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> 
                            <div class=" col s6">
                                <div class="btn-group">
                                <label for="first_name">支付方式</label>
                                    @if($os->order->zhuangtai_id == 2)
                                        <select data-toggle="dropdown" class="btn btn-primary dropdown-toggle" aria-expanded="true" name="zhifu_id"><span class="caret"></span>
                                            @foreach($zhifu as $v)
                                                <option value="{{$v['id']}}"
                                                @if($v['id']==$os->order->zhifu_id)
                                                    selected
                                                @endif >
                                            {{$v['name']}}</option>
                                            @endforeach
                                    @else
                                        <select data-toggle="dropdown" class="btn btn-primary dropdown-toggle" aria-expanded="true" name="zhifu_id"><span class="caret"></span>
                                            <option value="{{$os->order->zhifu->id}}" >{{$os->order->zhifu->name}}</option>
                                    @endif
                                    </select>
                                </div>
                            </div>                          
                        </div>

                        <div class="row">
                            <div class=" col s6">
                                <div class="btn-group">
                                    <label for="first_name">商品口味</label>
                                    <select data-toggle="dropdown" class="btn btn-primary dropdown-toggle" aria-expanded="true" name="flavor_id"><span class="caret"></span>
                                        @foreach($flavor as $v)
                                            <option value="{{$v['id']}}"
                                            @if($v['id']==$os->flavor_id)
                                                selected
                                            @endif >{{$v['fname']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class=" col s6">
                                <div class="btn-group">
                                    <label for="first_name">商品包装</label>
                                    <select data-toggle="dropdown" class="btn btn-primary dropdown-toggle" aria-expanded="true" name="pack_id"><span class="caret"></span>
                                        @foreach($pack as $v)
                                            <option value="{{$v['id']}}"
                                            @if($v['id']==$os['pack_id'])
                                                selected
                                            @endif >{{$v['pname']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <ul>
                            @foreach($uaddress as $v)
                            <li>
                                <div class="row">
                                    <div class="col s1">
                                        <input type="radio" name="uaddress_id" value="{{$v->id}}" style="position: static;opacity:1;margin-top: 40px;"
                                            @if($v['id'] == $os->order->uaddress_id)
                                                checked
                                            @endif
                                        >
                                    </div>
                                    <div class="col s7">
                                        <div data-toggle="distpicker">
                                            <span style="font-size: 15px;">收货地址:</span><br><br>
                                            <div class="form-group" style="float: left">
                                                <select class="form-control" id="province1" data-province="{{explode('-',$v->address)[0]}}" disabled></select>
                                            </div>
                                            <div class="form-group" style="float: left; margin-left: 5px;">
                                                <select class="form-control" id="city1" data-city="{{explode('-',$v->address)[1]}}" disabled></select>
                                            </div>
                                            <div class="form-group" style="float: left;margin-left: 5px;">
                                                <select class="form-control" id="district1" data-district="{{explode('-',$v->address)[2]}}" disabled></select>
                                            </div>
                                        </div>
                                        <div style="clear: both"></div>
                                    </div>
                                    <div class="col s4">
                                        <label for="last_name">详细地址</label>
                                        <input id="last_name" type="text" class="validate" name="xadress" value="{{$v->xadress}}" readonly>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                        
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