@extends('layouts.admin') @section('title') 商品评论列表 @endsection @section('title','商品评论列表') @section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-content">
            <div class="table-responsive">
                <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid">
                    <div class="row">
                        <div class="col-sm-6">
                            <form action="comment" method="POST">
                                <button class="btn btn-danger dropdown-toggle">删除</button>
                                {{csrf_field()}} {{method_field('DELETE')}}
                            </form>
                        </div>
                        <div class="col-sm-6">
                            <form action="/comment" method="get">
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
                                <th class="center">id</th>
                                <th class=" center">用户名</th>
                                <th class=" center ">商品名</th>
                                <th class="center">评论内容</th>
                                <th class="center">操作</th>
                            </tr>
                        </tbody>
                        <tbody>
                            @foreach($comments as $v)
                            <tr class="gradeA odd">
                                <td>
                                    <center>
                                        <input type="checkbox" id="test{{$v['id']}}">
                                        <label for="test{{$v['id']}}" style="margin-bottom:-10px"></label>
                                    </center>
                                </td>
                                <td class="center">{{$v['id']}}</td>
                                <td class="center">{{$v->user->uname}}</td>
                                <td class="center">{{$v->shop->sname}}</td>
                                <td class="center">{{$v['content']}}</td>
                                <td>
                                    <form action="/comment/{{$v['id']}}" method="post">
                                        {{method_field('DELETE')}} {{csrf_field()}}
                                        <button class="btn btn-danger dropdown-toggle">删除</button>
                                    </form>
                                </td>
                                @endforeach
                    </table>
                    <div class="row">
                        <div class="am-cf">
                            <div class="am-fr">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection