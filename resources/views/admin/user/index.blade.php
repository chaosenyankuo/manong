@extends('layouts.admin') @section('title','用户列表') @section('content')
<div id="page-wrapper">
    <div class="header">
        <h1 class="page-header">用户列表</h1>
    </div>
    <div id="page-inner">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-action">
                    用户列表
                </div>
                <div class="card-content">
                    <div class="table-responsive">
                        <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid">
                            <form action="/user" method="post">
                                <div id="dataTables-example_filter" class="dataTables_filter">
                                    <label>搜索:
                                        <input type="search" class="form-control input-sm" aria-controls="dataTables-example" name="keywords" value="{{request()->keywords}}">
                                    </label>
                                    <button class="waves-effect waves-light ">搜索</button>
                                </div>
                            </form>
                            <table class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example" aria-describedby="dataTables-example_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column ascending">ID</th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column ascending">昵称</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width:100px;">用户</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width:80px;">性别</th>
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
                                                @if($v->sex == '1')
                                                    男
                                                @elseif($v->sex == '2')
                                                    女
                                                @else
                                                    保密
                                                @endif
                                            </td>
                                            <td class="center ">{{$v-> birthday}}</td>
                                            <td class="center ">{{$v-> email}}</td>
                                            <td class="center ">{{$v -> created_at}}</td>
                                            <td class="center ">
                                                <a href="/user/{{$v -> id}}/edit" class="waves-effect waves-light ">编辑</a>
                                                <form action="/user/{{$v -> id}}" method="post">
                                                    {{csrf_field()}}
                                                    {{method_field('DELETE')}}
                                                    <button>删除</button>
                                                </form>
                                                <a href="/user/{{$v -> id}}/anquan" class="waves-effect waves-light">安全设置</a>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <style>
                                #a > ul{
                                    float:right;
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
    </div>
    <!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->
@endsection