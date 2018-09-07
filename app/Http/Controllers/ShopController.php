<?php

namespace App\Http\Controllers;


use App\Cate;
use App\Flavor;
use App\Pack;
use App\Shop;
use App\Tag;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cates = Cate::all();
        $tags = Tag::all();
        $flavors = Flavor::all();
        $shops = Shop::orderBy('id','desc')
            ->where('sname','like','%'.request()->keywords.'%')
            ->paginate(5);
        return view('admin.shop.index',compact('shops','cates','tags','flavors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cates = Cate::all();
        $tags = Tag::all();
        $flavors = Flavor::all();
        return view('admin.shop.create',compact('cates','tags','flavors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $shop = new Shop;
        $shop -> sname = $request -> sname;
        $shop -> sprice = $request -> sprice;
        $shop -> msales = $request -> msales;
        $shop -> csales = $request -> csales;
        $shop -> guige = $request -> guige;
        $shop -> biaozhun = $request -> biaozhun;
        $shop -> shengchan = $request -> shengchan;
        $shop -> eat = $request -> eat;
        $shop -> save = $request -> save;
        $shop -> scount = $request -> scount;
        $shop -> recom = $request -> recom;
        $shop -> date = $request -> date;
        $shop -> peiliao = $request -> peiliao;
        $shop -> place = $request -> place;
        $shop -> yplace = $request -> yplace;
        $shop -> cate_id = $request -> cate_id;
        if($request->hasFile('simage')){
            $shop->simage = '/'.$request->simage->store('uploads/'.date('Ymd'));
        }
        if($request->hasFile('simage1')){
            $shop->simage1 = '/'.$request->simage1->store('uploads/'.date('Ymd'));
        }
        if($request->hasFile('simage2')){
            $shop->simage2 = '/'.$request->simage2->store('uploads/'.date('Ymd'));
        }
        DB::beginTransaction();
        //插入
        if($shop->save()){
            //处理标签及口味
            try{
                $res = $shop->tags()->sync($request->tag_id);
                $jie = $shop->flavors()->sync($request->flavor_id);
                DB::commit();
                return redirect('/shop')->with('success','添加成功');
            }catch(\Exception $e){
                DB::rollback();
                return back()->with('error','添加失败');
            }
        }else{
            Db::rollback();
            return back()->with('error','添加失败');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $shop = Shop::findOrFail($id);
        //当前商品的评论
        $comment = Shop::find($id)->comments; 
        //包装
        $pack = Pack::all();
        //口味
        $flavor = Flavor::all();
        //获取分类
        $cates = Cate::all();
        //推荐商品
        $recom = Shop::where('recom','1')->take(5)->orderBy('id','desc')->get();
        return view('home.shop.index',compact('shop','comment','pack','flavor','recom','cates'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cates = Cate::all();
        $tags = Tag::all();
        $flavors = Flavor::all();
        $shop = Shop::findOrFail($id);
        return view('admin.shop.edit',compact('shop','tags','cates','flavors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $shop = Shop::findOrFail($id);
        $shop -> sname = $request -> sname;
        $shop -> sprice = $request -> sprice;
        $shop -> msales = $request -> msales;
        $shop -> csales = $request -> csales;
        $shop -> guige = $request -> guige;
        $shop -> biaozhun = $request -> biaozhun;
        $shop -> shengchan = $request -> shengchan;
        $shop -> eat = $request -> eat;
        $shop -> save = $request -> save;
        $shop -> scount = $request -> scount;
        $shop -> recom = $request -> recom;
        $shop -> date = $request -> date;
        $shop -> peiliao = $request -> peiliao;
        $shop -> place = $request -> place;
        $shop -> yplace = $request -> yplace;
        $shop -> cate_id = $request -> cate_id;
        if($request->hasFile('simage')){
            $shop->simage = '/'.$request->simage->store('uploads/'.date('Ymd'));
        }
        if($request->hasFile('simage1')){
            $shop->simage1 = '/'.$request->simage1->store('uploads/'.date('Ymd'));
        }
        if($request->hasFile('simage2')){
            $shop->simage2 = '/'.$request->simage2->store('uploads/'.date('Ymd'));
        }
        DB::beginTransaction();
        //插入
        if($shop->save()){
            //处理标签
            try{
                $res = $shop->tags()->sync($request->tag_id);
                $jie = $shop->flavors()->sync($request->flavor_id);
                DB::commit();
                return redirect('/shop')->with('success','修改成功');
            }catch(\Exception $e){
                DB::rollback();
                return back()->with('error','修改失败');
            }
        }else{
            Db::rollback();
            return back()->with('error','修改失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shop = Shop::findOrFail($id);

        DB::table('shop_tag')->where('shop_id',$shop->id)->delete();

        if($shop->delete()){
            return redirect('/shop')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }
}
