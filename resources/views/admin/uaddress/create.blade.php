@extends('layouts.admin') @section('title','地址添加') @section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-content">
            <form class="col s12 form-inline" action="/uaddress" method="post">
                <div class="row">
                    <div class="input-field col s4">
                        <span style="font-size: 15px;">用户:</span>
                        <div class="btn-group">
                            <select data-toggle="dropdown" class="btn btn-primary dropdown-toggle" name="user_id">
                                <option value="">请选择用户</option>
                                @foreach($users as $v)
                                <option value="{{$v->id}}">{{$v->uname}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="input-field col s8">
                        <div data-toggle="distpicker">
                            <span style="font-size: 15px;">地址:</span>
                            <div class="form-group">
                                <select class="form-control" id="province1" name="sheng"></select>
                            </div>
                            <div class="form-group">
                                <select class="form-control" id="city1" name="shi"></select>
                            </div>
                            <div class="form-group">
                                <select class="form-control" id="district1" name="xian"></select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s4">
                        <input id="last_name" type="text" class="validate" name="uphone">
                        <label for="last_name">电话</label>
                    </div>
                    <div class="input-field col s8">
                        <input id="last_name" type="text" class="validate" name="xadress">
                        <label for="last_name" class="">详细地址</label>
                    </div>
                </div>
                {{csrf_field()}}
                <button class="waves-effect waves-light btn" style="margin-left:400px;">提交</button>
            </form>
            <div class="clearBoth"></div>
        </div>
    </div>
</div>
<!-- /. PAGE WRAPPER  -->
@endsection