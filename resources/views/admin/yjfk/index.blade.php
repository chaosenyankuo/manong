@extends('layouts.admin')
@section('title','用户反馈列表') 
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-content">
            <div class="table-responsive">
                <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid">
                    <div class="row">
                        <div class="col-sm-6">
                           
                        </div>
                       
                    </div>
                    <table class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example" aria-describedby="dataTables-example_info">
                        <thead>
                            <tr role="row">
                                <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">ID</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">用户名称</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">反馈内容</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($yjfk as $v)
                            <tr class="gradeA odd">
                                <td class="center ">{{$v -> id}}</td>
                                <td class="center ">{{$v -> user->nickname}}</td>
                                <td class="center ">{{$v -> content}}</td>
                                <td class="center ">
                                <form action="/admin/yjfkui/{{$v->id}}" method="post">
                                        {{csrf_field()}} 
                                        {{method_field('DELETE')}}
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
                            {{ $yjfk->appends(request()->all())->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /. PAGE WRAPPER  -->
@endsection