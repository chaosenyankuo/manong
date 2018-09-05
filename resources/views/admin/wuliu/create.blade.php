@extends('layouts.admin') @section('title') 物流管理 @endsection @section('title','物流管理') @section('content')
<div id="page-inner">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
               
                <div class="card-content">
                    <form class="col s12" method="post" action="/wuliu" enctype="multipart/form-data">
                       <div class="row" style="margin-left:300px">
                            <div class=" col s6">
                            <label for="first_name">物流公司</label>
                                <input  id="first_name" type="text" class="validate" name="name" >
                                
                            </div>
                        </div>                       
                       {{csrf_field()}}
                        <button class="waves-effect waves-light btn" style="margin-left:450px">提交</button>
                    </form>
                    <div class="clearBoth"></div>
                </div>
            </div>
        </div>
    </div>
   
    <!-- /.col-lg-12 -->
    <footer>
        <p>All right reserved. Template WebThemez.com. More Templates <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a></p>&gt;</footer>
</div>
@endsection