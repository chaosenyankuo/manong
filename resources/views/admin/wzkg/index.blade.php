@extends('layouts.admin') @section('title') 网站开关 @endsection @section('title','网站开关') @section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-content">
            <div class="table-responsive">
                <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid">
                    <div class="row">
                        <div class="col-sm-6">
                            <form action="/wzkg" method="post">
                                
                        <br>
                        <br>
                        <ul class="forminfo">
                            {{csrf_field()}}
                            <li>
                                <label>&nbsp;</label>
                                <input name="over" class="btn btn-primary btn6 mr10" value="关闭网站" type="submit">&nbsp;
                            </li>
                        </ul>
                        </form>
                    </div>
                    <br>
                    <br>    
                    <div class="col-sm-6">
                        <form action="/wzkg/destroy" method="post">
                            <ul class="forminfo">
                                {{method_field('DELETE')}} {{csrf_field()}}
                                <li>
                                    <label>&nbsp;</label>
                                    <button class="btn btn-primary btn6 mr10" id="one" type="submit">开启网站</button>
                                </li>
                            </ul>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="am-cf">
                        <div class="am-fr">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection