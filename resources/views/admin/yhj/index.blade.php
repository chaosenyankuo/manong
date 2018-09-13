@extends('layouts.admin') @section('title') 优惠劵管理 @endsection @section('title','优惠劵管理') @section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-content">
            <div class="table-responsive">
                <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid">
                    <div class="row">
                        <div class="col-sm-6">
                            <form action="/yhj" method="POST">
                                <a href="/yhj/create" class="btn btn-waring dropdown-toggle">添加</a>
                                <button class="btn btn-danger dropdown-toggle">删除</button>
                                {{csrf_field()}} {{method_field('DELETE')}}
                            </form>
                        </div>
                        <div class="col-sm-6">
                            <form action="/link" method="get">
                                <div id="dataTables-example_filter" class="dataTables_filter">
                                    <label>Search:
                                        <input type="search" class="form-control input-sm" aria-controls="dataTables-example" name="keywords" value="">
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
                               
                                <th class="center">id</th>
                                <th class="center">优惠劵码</th>
                                <th class="center">优惠劵图片</th>
                                <th class="center">优惠金额</th>
                                <th class="center">转盘转动次数</th>
                                <th class="center">中奖位置</th>
                                <th class="center">操作</th>
                            </tr>
                        </tbody>
                        <tbody>
                            @foreach ($yhj as $v)
                            <tr class="gradeA odd">
                                <td class="center">{{$v['id']}}</td>
                                <td class="center">{{$v['yhj_id']}}</td>
                                <td class="center"><img data-src="{{$v['yhj_pic']}}" alt="" width="50" height="30"></td>
                                <td class="center">{{$v['yhj_pay']}}</td>
                                <td class="center">{{$v['cycle']}}</td>
                                <td class="center">{{$v['prize']}}</td>
                                <td>
                                    <form action="yhj/{{$v['id']}}" method="post">
                                        <a href="/yhj/{{$v['id']}}/edit" style="float:left " class="waves-effect waves-light btn">编辑</a> {{method_field('DELETE')}} {{csrf_field()}}
                                        <button class="btn btn-danger dropdown-toggle">删除</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                    </table>
                    <div class="row">
                        <div class="am-cf">
                            <div class="am-fr">
                             {{ $yhj->appends(request()->all())->links() }}  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection