@extends('layouts.admin') @section('title','分类列表') @section('title') 分类列表 @endsection @section('content')
<div class="col-md-12">
    <!-- Advanced Tables -->
    <div class="card">
        <div class="card-content">
            <div class="table-responsive">
                <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid">
                    <div class="row">
                        <div class="col-sm-6">
                            <form action="/cate" method="POST">
                                <a href="/cate/create" class="btn btn-waring dropdown-toggle">添加</a>
                                <button class="btn btn-danger dropdown-toggle">删除</button>
                                {{csrf_field()}} {{method_field('DELETE')}}
                            </form>
                        </div>
                        <div class="col-sm-6">
                            <form action="/cate" method="get">
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
                            <tr role="row">
                                <th>
                                    <center>
                                    <input type="checkbox" id="test9999999" >
                                    <label for="test9999999" style="margin-bottom:-10px"></label>
                                    </center>
                                </th>
                                <th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column ascending" style="width: 245.012px;">ID</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 377.012px;">分类名</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 341.012px;">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cates as $v)
                            <tr class="gradeA odd">
                                <td><center>
                                    <input type="checkbox" id="test.{{$v['id']}}">
                                    <label for="test.{{$v['id']}}" style="margin-bottom:-10px"></label>
                                    </center>
                                </td>
                                <td class="sorting_1">{{$v['id']}}</td>
                                <td class=" ">{{$v['cname']}}</td>
                                <td class=" ">
                                    <form action="/cate/{{$v['id']}}" method="POST">
                                        <a href="/cate/{{$v['id']}}/edit">
                                            <button class="btn-primary btn-min" type="button">修改</button>
                                        </a>
                                        <button class="btn-danger btn-min">删除</button>
                                        {{csrf_field()}} {{method_field('DELETE')}}
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
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

                    .pagination li.active {
                        background-color: white;
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
                    <div class="row">
                        <div class="col-sm-6">
                            {{$cates->appends(request()->all())->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End Advanced Tables -->
</div>
@endsection