@extends('layouts.admin') @section('title','商品列表') @section('title') 商品列表 @endsection @section('content')
<div class="col-md-12">
    <!-- Advanced Tables -->
    <div class="card">
        <div class="card-content">
            <div class="table-responsive">
                <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid">
                    <div class="row">
                        <div class="col-sm-6">
                                <a href="/shop/create" class="btn btn-waring dropdown-toggle">添加</a>
                                <button class="btn btn-danger dropdown-toggle" id="shanchu">删除</button>
                        </div>
                        <div class="col-sm-6">
                            <form action="/shop" method="get">
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
                                        <input type="checkbox" id="test9999999">
                                        <label for="test9999999" style="margin-bottom:-10px"></label>
                                    </center>
                                </th>
                                <th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column ascending" style="width: 245.012px;">ID</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 377.012px;">商品名称</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 377.012px;">商品价格</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 377.012px;">商品图片</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 377.012px;">商品口味</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 377.012px;">商品包装</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 377.012px;">商品库存</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 377.012px;">是否推荐</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 377.012px;">商品分类</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 377.012px;">商品标签</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 341.012px;">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($shops as $v)
                            <tr class="gradeA odd">
                                <td class="center">
                                        <input type="checkbox" id="test.{{$v['id']}}" name="id[]" value="{{$v['id']}}">
                                        <label for="test.{{$v['id']}}" style="margin-bottom:-10px"></label>
                                </td>
                                <td class="center">{{$v['id']}}</td>
                                <td class="center">{{$v['sname']}}</td>
                                <td class="center">{{$v['sprice']}}</td>
                                <td class="center"><img src="{{$v['simage']}}" width="30" height="30" alt=""></td>
                                <td class="center">
                                    @foreach($flavors as $vvv)
                                    @if(in_array($vvv->id,$v->flavors->pluck('id')->toArray()))
                                        {{$vvv['fname']}}
                                    @endif
                                    @endforeach
                                </td>
                                <td class="center">
                                    @foreach($packs as $vvvv)
                                    @if(in_array($vvvv->id,$v->packs->pluck('id')->toArray()))
                                        {{$vvvv['pname']}}
                                    @endif
                                    @endforeach
                                </td>
                                <td class="center">{{$v['scount']}}</td>
                                <td class="center">
                                    @if($v['recom'] == 1)
                                            是
                                    @endif
                                    @if($v['recom'] == 0)
                                            否
                                    @endif
                                </td>
                                <td class=" ">{{$v->cate->cname}}</td>
                                <td class=" ">
                                    @foreach($tags as $vv)
                                    @if(in_array($vv->id,$v->tags->pluck('id')->toArray()))
                                        {{$vv['tname']}}
                                    @endif
                                    @endforeach
                                </td>
                                <td class=" ">
                                    <form action="/shop/{{$v['id']}}" method="POST">
                                        <a href="/shop/{{$v['id']}}/edit">
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
                        <div class="col-sm-12">
                            {{$shops->appends(request()->all())->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End Advanced Tables -->
</div>
@endsection