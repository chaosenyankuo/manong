@extends('layouts.admin') @section('title','商品修改') @section('title') 商品修改 @endsection @section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-content">
            <form class="col s12" action="/shop/{{$shop['id']}}" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col s6">
                        <label>名称</label>
                        <input type="text" name="sname" class="validate" value="{{$shop['sname']}}">
                    </div>
                    <div class="col s6">
                        <label>价格</label>
                        <input type="number" name="sprice" class="validate" value="{{$shop['sprice']}}">
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <label >商品图片</label><img src="{{$shop['simage']}}" style="margin-left:100px" width="80" height="80" alt="">
                        <input style="margin-left:100px" class="btn btn-primary dropdown-toggle" type="file" name="simage" >
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <label>商品分类</label>
                        <p style="margin-left:100px">
                            @foreach($cates as $v)
                            <input name="cate_id" type="radio" value="{{$v['id']}}" id="test{{$v['id']+500}}" 
                            @if($v['id'] == $shop['cate_id']) 
                                checked
                            @endif>
                            <label for="test{{$v['id']+500}}">{{$v['cname']}}</label>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            @endforeach
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <label>商品标签</label>
                        <p style="margin-left:100px">
                        @foreach($tags as $v)
                            <input type="checkbox" id="test{{$v['id']+77}}" name="tag_id[]" value="{{$v['id']}}"
                            @if(in_array($v->id,$shop->tags->pluck('id')->toArray()))
                                checked
                                @endif
                            >
                            <label for="test{{$v['id']+77}}">{{$v['tname']}}</label>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        @endforeach
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col s6">
                        <label>口味</label>
                        <input type="text" name="sflavor" class="validate" value="{{$shop['sflavor']}}">
                    </div>
                    <div class="col s6">
                        <label>食用方法</label>
                        <input type="text" name="eat" class="validate" value="{{$shop['eat']}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col s6">
                        <label>月销量</label>
                        <input type="number" name="msales" class="validate" value="{{$shop['msales']}}">
                    </div>
                    <div class="col s6">
                        <label>累计销量</label>
                        <input type="number" name="csales" class="validate" value="{{$shop['csales']}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col s6">
                        <label>库存</label>
                        <input type="number" name="scount" class="validate" value="{{$shop['scount']}}">
                    </div>
                    <div class="col s6">
                        <label>保质期</label>
                        <input type="text" name="date" class="validate" value="{{$shop['date']}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col s6">
                        <label>产地</label>
                        <input type="text" name="place" class="validate" value="{{$shop['place']}}">
                    </div>
                    <div class="col s6">
                        <label>原料产地</label>
                        <input type="text" name="yplace" class="validate" value="{{$shop['yplace']}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col s6">
                        <label>配料</label>
                        <input type="text" name="peiliao" class="validate" value="{{$shop['peiliao']}}">
                    </div>
                    <div class="col s6">
                        <label>存储方法</label>
                        <input type="text" name="save" class="validate" value="{{$shop['save']}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col s6">
                        <label>产品规格</label>
                        <input type="text" name="guige" class="validate" value="{{$shop['guige']}}">
                    </div>
                    <div class="col s6">
                        <label>标准号</label>
                        <input type="text" name="biaozhun" class="validate" value="{{$shop['biaozhun']}}"> 
                    </div>
                </div>
                <div class="row">
                    <div class="col s6">
                        <label>生产许可编号</label>
                        <input type="text" name="shengchan" class="validate" value="{{$shop['shengchan']}}">
                    </div>
                    <div class="input-field col s6">
                        <label>是否推荐</label>
                        <p style="margin-left:100px">
                            <input name="recom" type="radio" value="1" id="test999999" @if($shop['recom'] == 1) checked  @endif>
                            <label for="test999999">是</label>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                       
                            <input name="recom" type="radio" value="0" id="test8888888" @if($shop['recom'] == 0) checked  @endif>
                            <label for="test8888888">否</label>
                        </p>
                    </div>
                </div>
                {{csrf_field()}}
                {{method_field('PUT')}}
                <div class="center">
                    <button class="waves-effect waves-light btn-large"><i class="material-icons left">cloud</i>确认修改</button>
                </div>
            </form>
            <div class="clearBoth"></div>
        </div>
    </div>
</div>
@endsection