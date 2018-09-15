@extends('layouts.admin') 
@section('title') 商城头条修改 @endsection 
@section('title','商城头条修改') 

@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-action">
            带给你不一样的体验
        </div>
        <div class="card-content">
            <form class="col s12" action="/sctt/{{$sctt['id']}}" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class=" col s6">
                    <label for="last_name">商城公告</label>
                        <input id="last_name" type="text" name="scgg" value="{{$sctt['scgg']}}" class="validate">
                        
                    </div>
                   &nbsp;
                    <div class=" col s5">
                     <label for="last_name">商城公告地址</label>
                        <input id="last_name" type="text"  value="{{$sctt['scgg_url']}}"name="scgg_url" class="validate">
                       
                    </div>
                   
                    <div class="col s6">
                    <label for="last_name">商城特惠</label>
                        <input id="last_name" type="text" name="scth"  value="{{$sctt['scth']}}"class="validate">
                        
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>
                     
                     <div class=" col s5">
                     <label for="last_name">商城特惠地址</label>
                        <input id="last_name" type="text" name="scth_url"  value="{{$sctt['scth_url']}}"class="validate">
                        
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>
                     {{csrf_field()}}{{method_field('PUT')}}
                    <button class="waves-effect waves-light btn" style="margin-left:450px;">提交</button>
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