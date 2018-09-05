@extends('layouts.admin') @section('title') 合作公司列表 @endsection @section('title','合作公司列表') @section('content')
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
                
            </div>
        </div>
        <table class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example" aria-describedby="dataTables-example_info">
            <thead>
            </thead>
            <tbody>
                <tr class="gradeA odd">
                    <td class=" center ">id</td>
                    <td class=" center ">公司名称</td>
                    <td class="center">操作</td>
                </tr>
            </tbody> 
            @foreach($zhifu as $v)
            <tbody>
            
                <td>{{$v['id']}}</td>
	            <td>{{$v['name']}}</td>
                
                <td>
                    <a href="/zhifu/{{$v['id']}}/edit" style="float:left " class="waves-effect waves-light btn">编辑</a>
                    <form action="/zhifu/{{$v['id']}}" method="post">
                        {{method_field('DELETE')}} {{csrf_field()}}
                        <button class="btn btn-danger dropdown-toggle" style="float:right">删除</button>
                    </form>
                </td>
              
                </thody> 
                @endforeach 
        </table>
        
        <div class="row">
            <div class="col-sm-6">
                <div class="dataTables_info" id="dataTables-example_info" role="alert" aria-live="polite" aria-relevant="all">Showing 1 to 10 of 57 entries</div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection