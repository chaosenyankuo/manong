@extends('home.grzx.shdz')

@section('content')

<div class="clear"></div>
    <a class="new-abtn-type" data-am-modal="{target: '#doc-modal-1', closeViaDimmer: 0}">修改地址</a>
    <!--例子-->
    <div class="am-modal am-modal-no-btn" id="doc-modal-1">
        <div class="add-dress">
            <!--标题 -->
            <div class="am-cf am-padding">
                <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">修改地址</strong> / <small>Edit&nbsp;address</small></div>
            </div>
            <hr/>
            <div class="am-u-md-12 am-u-lg-8" style="margin-top: 20px;">
                <form class="am-form am-form-horizontal" action="/home/dzupdate/{{$uadd['id']}}" method="post">
                    <div class="am-form-group">
                        <label for="user-name" class="am-form-label">收货人</label>
                        <div class="am-form-content">
                            <input type="text" id="user-name" name="name" value="{{$uadd['name']}}">
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="user-name" class="am-form-label">手机号</label>
                        <div class="am-form-content">
                            <input type="text" id="user-name" name="uphone" value="{{$uadd['uphone']}}">
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="user-address" class="am-form-label">收货地址</label>
                        <div class="am-form-content address">
                            <div class="input-field col s8">
                                <div data-toggle="distpicker">
                                    <div class="form-group">
                                        <select class="form-control" id="province1" name="sheng" data-province="{{$san[0]}}"></select>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" id="city1" name="shi" data-city="{{$san[1]}}"></select>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" id="district1" name="xian" data-district="{{$san[2]}}"></select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="user-intro" class="am-form-label">详细地址</label>
                        <div class="am-form-content">
                            <textarea class="" rows="3" name="xadress" id="user-intro">{{$uadd['xadress']}}</textarea>
                            <small>100字以内写出你的详细地址....</small>
                        </div>
                    </div>
                    <div class="am-form-group">
                        <div class="am-u-sm-9 am-u-sm-push-3">
                            {{csrf_field()}}
                            <button class="am-btn am-btn-danger">保存</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection