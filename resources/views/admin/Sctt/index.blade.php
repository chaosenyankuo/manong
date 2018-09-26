@extends('layouts.admin') @section('title') 商城头条列表 @endsection @section('title','商城头条列表') @section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-content">
            <div class="table-responsive">
                <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid">
                    <div class="row">
                        <div class="col-sm-6">
                            <form action="/sctt" method="POST">
                                <a href="/sctt/create" class="btn btn-waring dropdown-toggle">添加</a>
                                <button class="btn btn-danger dropdown-toggle">删除</button>
                                {{csrf_field()}} {{method_field('DELETE')}}
                            </form>
                        </div>
                        <div class="col-sm-6">
                            <form action="/sctt" method="get">
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
                                <th>
                                    <center>
                                        <input type="checkbox" id="fxk">
                                        <label for="fxk" style="margin-bottom:-10px"></label>
                                    </center>
                                </th>
                                <th class="center">id</th>
                                <th class="center">商城特惠</th>                         
                                <th class="center">商城特惠地址</th>
                                <th class="center">商城公告</th>
                                <th class="center">商城公告地址</th>
                                <th class="center">操作</th>
                            </tr>
                        </tbody>
                        <tbody>
                            <?php $i = 1;?>
                          @foreach ($sctt as $v)  
                          <?php $i++; ?>
                            <tr class="gradeA odd">
                                <td>
                                    <center>
                                        <input type="checkbox" id="{{$i}}">
                                        <label for="{{$i}}" style="margin-bottom:-10px"></label>
                                    </center>
                                </td>
                                <td class="center">{{$v['id']}}</td>
                                <td class="center">{{$v['scth']}}</td>
                                <td class="center">{{$v['scth_url']}}</td>
                                <td class="center">{{$v['scgg']}}</td>
                                <td class="center">{{$v['scgg_url']}}</td>
                                <td width="20px">
                                    <form action="/sctt/{{$v['id']}}" method="post">
                                    <a href="/sctt/{{$v['id']}}/edit" style="float:left " class="waves-effect waves-light btn">编辑</a>
                                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                        {{method_field('DELETE')}} {{csrf_field()}}
                                        <button class="btn btn-danger dropdown-toggle">删除</button>
                                    </form>
                                </td>
                              
                            </tr>
                             @endforeach
                    </table>
                    <div class="row">
                        <div class="am-cf">
                            <div class="am-fr">
                              {{ $sctt->appends(request()->all())->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection