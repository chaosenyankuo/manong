
@extends('layouts.admin') @section('title') 添加足迹 @endsection @section('title','添加足迹') @section('content')
<div id="page-inner">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-content">
                    <form class="col s12" method="post" action="/zuji" enctype="multipart/form-data">
                        <div class="row">
                            <div class=" col s6">
                                <div class="btn-group">
                                    <label for="first_name">选择用户</label>
                                    <select data-toggle="dropdown" class="btn btn-danger dropdown-toggle" aria-expanded="true" name="user_id"><span class="caret"></span> @foreach($users as $v)
                                        <option value="{{$v->id}}">{{$v->uname}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="shangpin">
                            <div class=" col s6">
                                <div class="btn-group">
                                    <label for="first_name">选择商品</label>
                                    <select data-toggle="dropdown" class="btn btn-success dropdown-toggle" aria-expanded="true" name="shop_id" id="second">
                                        <span class="caret"></span>
                                    @foreach($shops as $v)
                                        <option value="{{$v->id}}">{{$v->sname}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        {{csrf_field()}}
                        <button class="waves-effect waves-light btn" style="margin-left:200px">提交</button>
                    </form>
                    <div class="clearBoth"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.col-lg-12 -->
</div>
@endsection
