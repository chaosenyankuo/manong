@extends('layouts.admin') 
@section('title') 友链列表
 @endsection

  @section('title','友链列表')

 @section('content')
 <div class="col-md-12">
<div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid">
    <div class="row">
        <div class="col-sm-6">
            <div class="dataTables_length" id="dataTables-example_length">
                <label>
                    <select name="dataTables-example_length" aria-controls="dataTables-example" class="form-control input-sm">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select> records per page</label>
            </div>
        </div>
        <div class="col-sm-6">
        <form action="link" method="get">
            <div id="dataTables-example_filter" class="dataTables_filter">
                <label style="font-size:30px;">搜索:
                    <input type="text"  value="{{request()->name}}" name="name" class="form-control input-sm" aria-controls="dataTables-example">
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
                <td class="sorting_1">id</td>
                <td class=" center">友链名称</td>
                <td class=" center ">友链地址</td>
                <td class="center">操作</td>
            </tr>
        </tbody>
        <tbody>
                   @foreach($links as $v)
             <tr  class="gradeA odd">
                 
                 <td class="center">{{$v['id']}}</td>                                
                 <td class="center">{{$v['name']}}</td>
                 <td class="center">{{$v['url']}}</td>
                 <td>
                    
					<a href="/link/{{$v['id']}}/edit" style="float:left "  class="waves-effect waves-light btn">编辑</a>
					<form  action="/link/{{$v['id']}}" method="post">
                    {{method_field('DELETE')}}
                    {{csrf_field()}}
					<button class="btn btn-danger dropdown-toggle">删除</button>
					</form>
					

                 </td>

                @endforeach
    </table>
    <div class="row">
        <div class="col-sm-6">
            <div class="dataTables_info" id="dataTables-example_info" role="alert" aria-live="polite" aria-relevant="all">You  Qing  Lian  Jie</div>
        </div>
        <div class="am-cf">
                    <div class="am-fr">
                        {{ $links->appends(request()->all())->links() }}
                    </div>
                </div>
        </div>
    </div>
</div>
</div>
@endsection