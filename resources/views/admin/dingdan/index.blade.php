@extends('layouts.admin') @section('title') 订单列表 @endsection @section('title','订单列表') @section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-content">
            <div class="table-responsive">
                <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid">
                    <div class="row">
                        <div class="col-sm-6">
                            <form action="/dingdan" method="POST">
                                <a href="/dingdan/create" class="btn btn-waring dropdown-toggle">添加</a>
                                <button class="btn btn-danger dropdown-toggle">删除</button>
                                {{csrf_field()}} {{method_field('DELETE')}}
                            </form>
                        </div>
                        <div class="col-sm-6">
                            <form action="/dingdan" method="get">
                                <div id="dataTables-example_filter" class="dataTables_filter">
                                    <label>Search:
                                        <input type="search" class="form-control input-sm" aria-controls="dataTables-example" name="keywords" value="{{request()->keywords}}">
                                    </label>
                                </div>
                            </form>
                        </div>
                    </div>
                    <table class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example" aria-describedby="dataTables-example_info">
                        <thead>
                        </thead>
                        <tbody>
                            <tr class="gradeA odd">
                                <th>
                                    <center>
                                        <input type="checkbox" id="test9999999">
                                        <label for="test9999999" style="margin-bottom:-10px"></label>
                                    </center>
                                </th>
                                <th class=" center ">id</th>
                                <th class=" center ">用户id</th>
                                <th class="center">商品id</th>
                                <th class="center">物流方式</th>
                                <th class="center">支付方式</th>
                                <th class="center">购物车id</th>
                                <th class="center">订单编号</th>
                                <th class="center">收货地址</th>
                                <th class="center">操作</th>
                            </tr>
                        </tbody>
                        @foreach($dingdan as $v)
                        <tbody>
                            <td>
                                <center>
                                    <input type="checkbox" id="test{{$v['id']}}">
                                    <label for="test{{$v['id']}}" style="margin-bottom:-10px"></label>
                                </center>
                            </td>
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
                    .pagination {
                        padding-left: 0;
                        margin: 1.5rem 0;
                        list-style: none;
                        color: #999;
                        text-align: left;
                        padding: 0;
                    }

                    .pagination li {
                        display: inline-block;
                    }

                    .pagination li a,
                    .pagination li span {
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

                    .pagination .active span {
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
                        <div class="am-fr" style="margin-right">
                            {{ $dingdan->appends(request()->all())->links() }}
                        </div>
                    </div>
                    <div class="row">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection