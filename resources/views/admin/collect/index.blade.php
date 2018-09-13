@extends('layouts.admin') @section('title','收藏列表') @section('title') 收藏列表 @endsection @section('content')
<div class="col-md-12">
    <!-- Advanced Tables -->
    <div class="card">
        <div class="card-content">
            <div class="table-responsive">
                <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid">
                    <div class="row">
                        <div class="col-sm-6">
                            <form action="/collect" method="POST">
                                <a href="/collect/create" class="btn btn-waring dropdown-toggle">添加</a>
                                <button class="btn btn-danger dropdown-toggle">删除</button>
                                {{csrf_field()}} {{method_field('DELETE')}}
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
                                <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 377.012px;">用户名</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 377.012px;">商品名</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 341.012px;">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($collects as $v)
                            <tr class="gradeA odd">
                                <td>
                                    <center>
                                    <input type="checkbox" id="test{{$v['id']}}">
                                    <label for="test{{$v['id']}}" style="margin-bottom:-10px"></label>
                                    </center>
                                </td>
                                <td class="sorting_1">{{$v['id']}}</td>
                                <td class=" ">{{$v->user->uname}}</td>
                                <td class=" ">{{$v->shop->sname}}</td>
                                <td class=" ">
                                    <form action="/collect/{{$v['id']}}" method="POST">
                                        <button class="btn-danger btn-min">删除</button>
                                        {{csrf_field()}} {{method_field('DELETE')}}
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    <!--End Advanced Tables -->
</div>
@endsection