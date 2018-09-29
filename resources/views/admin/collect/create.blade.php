@extends('layouts.admin') @section('title') 添加收藏 @endsection @section('title','添加收藏') @section('content')
<div id="page-inner">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-content">
                    <form class="col s12" method="post" action="/collect" enctype="multipart/form-data">
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
                                    <select data-toggle="dropdown" class="btn btn-primary dropdown-toggle" aria-expanded="true" name="cate_id" id="first"><span class="caret"></span>
                                        <option value="0">请选择</option>
                                        @foreach($cates as $v)
                                        <option value="{{$v->id}}" id="option">{{$v->cname}}</option>
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
                                        <option value="">请选择</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <style>
                        #shangpin {
                            display: none;
                        }
                        </style>
                        <!-- 伪造post方式请求 -->
                        <meta name="csrf-token" content="{{csrf_token()}}">
                        <script>
                        $("#first").change(function() {
                            $('#shangpin').css('display', 'block');
                            $('#second').empty();
                            // ajax伪造post请求设置
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });
                            var cate = $("#first").val();
                            $.ajax({
                                url: '/first',
                                type: 'post',
                                data: { cate: cate },
                                success: function(data) {
                                    var res = JSON.parse(data); //将json数据转为数组
                                    if (res != 0) {6
                                        for (var i = 0; i < res.length; i++) {
                                            var shopId = res[i]['id'];
                                            var shopName = res[i]['sname'];
                                            $("#second").append("<option value=" + shopId + ">" + shopName + "</option>");
                                        }
                                    }
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
