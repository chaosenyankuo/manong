@extends('layouts.admin') @section('title','用户列表') @section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-content">
            <div class="table-responsive">
                <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid">
                    <div class="row">
                        <div class="col-sm-6">
                            <form action="/user" method="POST">
                                <a href="/user/create" class="btn btn-waring dropdown-toggle">添加</a>
                                <button class="btn btn-danger dropdown-toggle">删除</button>
                                {{csrf_field()}} {{method_field('DELETE')}}
                            </form>
                        </div>
                        <div class="col-sm-6">
                            <form action="/user" method="get">
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
                                <th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column ascending">ID</th>
                                <th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column ascending">昵称</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width:100px;">用户</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width:80px;">性别</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width:80px;">头像</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">生日</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">邮箱</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">创建时间</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $v)
                            <tr class="gradeA odd">
                                <td class="center ">{{$v -> id}}</td>
                                <td class="center ">{{$v -> nickname}}</td>
                                <td class=" ">{{$v -> uname}}</td>
                                <td class=" ">
                                    @if($v->sex == '1') 男 @elseif($v->sex == '2') 女 @else 保密 @endif
                                </td>
                                <td class=" "><img data-src="{{$v -> image}}" alt="" width="50" height="30"></td>
                                <td class="center ">{{$v-> birthday}}</td>
                                <td class="center ">{{$v-> email}}</td>
                                <td class="center ">{{$v -> created_at}}</td>
                                <td class="center ">
                                    <form action="/user/{{$v -> id}}" method="post">
                                        <a href="/user/{{$v -> id}}/edit">
                                            <button class="btn-primary btn-min" type="button">修改</button>
                                        </a>
                                        {{csrf_field()}} {{method_field('DELETE')}}
                                        <button class="btn-danger btn-min">删除</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <style>
                    #a>ul {
                        float: right;
                    }
                    </style>
                    <div class="row">
                        <div id="a" class="col-sm-6" style="float:right;margin-right:0px;">
                            {{$users -> links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /. PAGE WRAPPER  -->
@endsection