@extends('layouts.admin') @section('title') 收藏添加 @endsection @section('title','收藏添加') @section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-action">
            带给你不一样的体验
        </div>
        <div class="card-content">
            <form class="col s12" action="/collect" method="post">
                <div class="row">
                    <div class=" col s6">
                        <div class="btn-group">
                            <label for="first_name">选择用户</label>
                            <select data-toggle="dropdown" class="btn dropdown-toggle" aria-expanded="true" name="user_id" id="first" onChange="change()"><span class="caret"></span> @foreach($cates as $v)
                                <option value="{{$v->id}}">{{$v->cname}}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class=" col s6">
                        <div class="btn-group">
                            <label for="first_name">选择分类</label>
                            <select data-toggle="dropdown" class="btn dropdown-toggle" aria-expanded="true" name="cate_id" id="second"><span class="caret"></span> @foreach($shop as $v)
                                <option class="la" value="{{$v->id}}">{{$v->sname}}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                </form>
                        <div class="clearBoth"></div>
                 </div>
                </div>
                <footer>
                        <p>All right reserved. Template WebThemez.com. More Templates <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a></p>
                    </footer>
                </div>
                @endsection