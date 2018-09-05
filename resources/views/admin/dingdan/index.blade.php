@extends('layouts.admin') @section('title') 订单列表 @endsection @section('title','订单列表') @section('content')
<div class="col-md-12">
    <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid">
        <div class="row">
            <div class="col-sm-6">
                <div class="dataTables_length" id="dataTables-example_length">
                    <label>
                        <select name="dataTables-example_length" aria-controls="dataTables-example" class="form-control input-sm">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select> records per page</label>
                </div>
            </div>
            <div class="col-sm-6">
                
            </div>
        </div>
        <table class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example" aria-describedby="dataTables-example_info">
            <thead>
            </thead>
            <tbody>
                <tr class="gradeA odd">
                    <td class=" center ">id</td>
                    <td class=" center ">用户id</td>
                    <td class="center">商品id</td>
                    <td class="center">物流方式</td>
                    <td class="center">支付方式</td>
                    <td class="center">购物车id</td>
                    <td class="center">订单编号</td>
                    <td class="center">收货地址</td>
                    <td class="center">操作</td>
                </tr>
            </tbody> 
            @foreach($dingdan as $v)
            <tbody>
                
                <td>{{$v['id']}}</td>
                <td>{{$v['user_id']}}</td>
                <td>{{$v['shop_id']}}</td>
                <td>{{$v->wuliu->name}}</td>
	            <td>{{$v->zhifu->name}}</td>
                <td>{{$v['shopcar_id']}}</td>
                <td>{{$v['order_bh']}}</td>
                <td width="300px">{{$v['uaddress_id']}}</td>
                
                <td width="140px">
                    <a href="/dingdan/{{$v['id']}}/edit" style="float:left " class="waves-effect waves-light btn">编辑</a>
                    <form action="/dingdan/{{$v['id']}}" method="post">
                        {{method_field('DELETE')}} {{csrf_field()}}
                        <button class="btn btn-danger dropdown-toggle" style="float:right">删除</button>
                    </form>
                </td>
              
                </thody> 
                @endforeach 
        </table>
         <style>
                    .pagination{
                        padding-left: 0;
                        margin: 1.5rem 0;
                        list-style: none;
                        color: #999;
                        text-align: left;
                        padding: 0;
                    }

                    .pagination li{
                        display: inline-block;
                    }

                    .pagination li a, .pagination li span{
                        color: #23abf0;
                        border-radius: 3px;
                        padding: 6px 12px;
                        position: relative;
                        display: block;
                        text-decoration: none;
                        line-height: 1.2;
                        background-color: #fff;
                        border: 1px solid #ddd;
                        border-radius: 0;
                        margin-bottom: 5px;
                        margin-right: 5px;
                    }

                    .pagination .active span{
                        color: #23abf0;
                        border-radius: 3px;
                        padding: 6px 12px;
                        position: relative;
                        display: block;
                        text-decoration: none;
                        line-height: 1.2;
                        background-color: #fff;
                        border: 1px solid #ddd;
                        border-radius: 0;
                        margin-bottom: 5px;
                        margin-right: 5px;
                        background: #23abf0;
                        color: #fff;
                        border: 1px solid #23abf0;
                        padding: 6px 12px;
                    }
                </style>
                <div class="am-cf">
                    <div class="am-fr"style="margin-right">
                        {{ $dingdan->appends(request()->all())->links() }}
                    </div>
                </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="dataTables_info" id="dataTables-example_info" role="alert" aria-live="polite" aria-relevant="all">Showing 1 to 10 of 57 entries</div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection