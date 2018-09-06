@extends('layouts.admin')

@section('title','地址修改')

@section('content')

<div class="col-lg-12">
    <div class="card">
        <div class="card-action">
            地址修改
        </div>
        <div class="card-content">
            <form class="col s12 form-inline" action="/uaddress/{{$uaddress -> id}}" method="post" >

                <div class="row">
                    <div class="input-field col s4">
                        <span style="font-size: 15px;">用户:</span>
                        <div class="btn-group">
                            <select data-toggle="dropdown" class="btn btn-primary dropdown-toggle" name="user_id">
                                <option value="">请选择用户</option>
                                @foreach($users as $v)
                                    <option value="{{$v->id}}" 
                                        @if($uaddress->user_id == $v->id)
                                            selected
                                        @endif
                                        >{{$v->uname}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="input-field col s8">
                        <div data-toggle="distpicker">
                            <span style="font-size: 15px;">地址:</span>
                            <div class="form-group">
                                <select class="form-control" id="province1" name="sheng" data-province="{{$uadd[0]}}"></select>
                            </div>
                            <div class="form-group">
                                <select class="form-control" id="city1" name="shi" data-city="{{$uadd[1]}}"></select>
                            </div>
                            <div class="form-group">
                                <select class="form-control" id="district1" name="xian" data-district="{{$uadd[2]}}"></select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s4">
                        <input id="last_name" type="text" class="validate" name="uphone" value="{{$uaddress->uphone}}">
                        <label for="last_name">电话</label>
                    </div>
                    <div class="input-field col s8">
                        <input id="last_name" type="text" class="validate" name="xadress" value="{{$uaddress->xadress}}">
                        <label for="last_name" class="">详细地址</label>
                    </div>
                </div>
                {{csrf_field()}}
                {{method_field('PUT')}}
                <button class="waves-effect waves-light btn" style="margin-left:400px;">提交</button>
            </form>
            <div class="clearBoth"></div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(window).load(function() {
        $('input:lt(8)').trigger('focus');
        $('input:lt(8)').trigger('blur');
    });
</script>

@endsection