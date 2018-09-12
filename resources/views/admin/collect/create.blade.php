@extends('layouts.admin') @section('title') 添加收藏 @endsection @section('title','添加收藏') @section('content')
<div id="page-inner">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-content">
                    <form class="col s12" method="post" action="/dingdan" enctype="multipart/form-data">
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
                        <div class="row">
                            <div class=" col s6">
                                <div class="btn-group">
                                    <label for="first_name">选择板块</label>
                                    <select data-toggle="dropdown" class="btn btn-primary dropdown-toggle" aria-expanded="true" name="cate_id" id="first"><span class="caret"></span> @foreach($cates as $v)
                                        <option value="{{$v->id}}" id="option">{{$v->cname}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col s6">
                                <div class="btn-group">
                                    <label for="first_name">选择商品</label>
                                    <select data-toggle="dropdown" class="btn btn-success dropdown-toggle" aria-expanded="true" name="cate_id" id="second"><span class="caret"></span> @foreach($shops as $v)
                                        <option value="{{$v->id}}">{{$v->sname}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <script>
                        $("#first").change(function() {
                            var cate = $("#first").val();
                            $.ajax({
                                url: '/first.php',
                                type: 'post',
                                data: { cate: cate},
                                success: function(data) {
                                    
                                },
                                async: false
                            })
                        });
                        </script>
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