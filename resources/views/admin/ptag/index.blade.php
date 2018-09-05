@extends('layouts.admin') @section('title') 商品评论标签列表 @endsection @section('title','商品评论标签列表') @section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-content">
            <div class="table-responsive">
                <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid">
                    <div class="row">
                        <div class="col-sm-6">
                            <form action="ptag" method="POST">
                                <a href="/ptag/create" class="btn btn-waring dropdown-toggle">添加</a>
                                <button class="btn btn-danger dropdown-toggle">删除</button>
                                {{csrf_field()}} {{method_field('DELETE')}}
                            </form>
                        </div>
                        <div class="col-sm-6">
                            <form action="/ptag" method="get">
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
                                <th class=" center">标签名称</th>
                                <th class="center">操作</th>
                            </tr>
                        </tbody>
                        <tbody>
                            @foreach($ptags as $v)
                            <tr class="gradeA odd">
                                <td>
                                    <center>
                                        <input type="checkbox" id="test{{$v['id']}}">
                                        <label for="test{{$v['id']}}" style="margin-bottom:-10px"></label>
                                    </center>
                                </td>
                                <td class="center">{{$v['id']}}</td>
                                <td class="center">{{$v['ptname']}}</td>
                                <td>
                                    <a href="/ptag/{{$v['id']}}/edit" style="float:left " class="waves-effect waves-light btn">编辑</a>
                                    <form action="/ptag/{{$v['id']}}" method="post">
                                        {{method_field('DELETE')}} {{csrf_field()}}
                                        <button class="btn btn-danger dropdown-toggle">删除</button>
                                    </form>
                                </td>
                                @endforeach
                            </tr>
                    </table>
                    <div class="row">
                        <div class="am-cf">
                            <div class="am-fr">
                                {{ $ptags->appends(request()->all())->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection