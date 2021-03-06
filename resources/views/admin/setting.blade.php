@extends('layouts.admin') @section('title') 网站设置 @endsection @section('title','网站设置') @section('content')
<div id="page-inner">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-content">
                    <form class="col s12" method="post" action="/admin/setting" enctype="multipart/form-data">
                        <div class="row">
                            <div class=" col s6">
                                <label for="first_name">标题</label>
                                <input id="first_name" type="text" class="validate" name="title" value="{{$setting['title']}}">
                            </div>
                            <div class=" col s6">
                                <label for="last_name">关键字</label>
                                <input id="last_name" type="text" class="validate" name="keywords" value="{{$setting['keywords']}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col s12">
                                <label for="password">描述</label>
                                <textarea class="" name="description" rows="5">{{$setting['description']}}</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col s12">
                                <label for="password">logo</label>
                                <input type="file" name="logo" class="waves-effect waves-light btn" id="user-name" placeholder="" style="margin-left:60px;">
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col s12">
                                <label for="email">域名</label>
                                <input id="email" type="text" class="validate" name="domain" value="{{$setting['domain']}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col s12">
                                <label for="email">版权</label>
                                <input id="email" type="text" class="validate" name="banquan" value="{{$setting['banquan']}}">
                            </div>
                        </div>
                       <!--  <div class="input-field col s6">
                            <label>网站开关</label>
                            <p style="margin-left:100px">
                                <input type="radio" value="1" id="test3" name="close" @if($setting[ 'close']==1 ) checked @endif>
                                <label for="test3">开</label>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input name="close" type="radio" value="0" id="test2" @if($setting[ 'close']==0 ) checked @endif>
                                <label for="test2">关</label>
                            </p>
                        </div> -->
                        {{csrf_field()}}
                        <button class="waves-effect waves-light btn" style="margin-left:450px">提交</button>
                    </form>
                    <div class="clearBoth"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.col-lg-12 -->
</div>
@endsection