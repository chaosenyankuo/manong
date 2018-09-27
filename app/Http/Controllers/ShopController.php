<?php

namespace App\Http\Controllers;


use App\Cate;
use App\Comment;
use App\Flavor;
use App\Link;
use App\Pack;
use App\Setting;
use App\Shop;
use App\Tag;
use App\User;
use App\Ptag;
use App\Ptag_shop;
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
        $packs = Pack::all();
        $uid = \Session::get('adminUser')['id'];
        $user = User::find($uid);
        $shops = Shop::orderBy('id','desc')
            ->where('sname','like','%'.request()->keywords.'%')
            ->paginate(5);
        return view('admin.shop.index',compact('shops','cates','tags','flavors','user','packs'));
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
        $packs = Pack::all();
        return view('admin.shop.create',compact('cates','tags','flavors','packs'));
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
                $guo = $shop->packs()->sync($request->pack_id);
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
        if(!empty($comment[0])){
            $hao = Comment::where('shop_id',$id)
                            ->where('com_id','1')
                            ->get();
            $zhong = Comment::where('shop_id',$id)
                            ->where('com_id','2')
                            ->get();
            $cha = Comment::where('shop_id',$id)
                            ->where('com_id','3')
                            ->get();            
            // 好评度
            $bilv = ceil(count($hao) / count($comment) * 100);
            
        }else{
            $hao = null;
            $zhong = null;
            $cha = null;
            $bilv = null;
        }

        //商品印象
        $ptags = Ptag::all();
        $a = $shop->ptags()->get();
        $b = [];
        $c = [];
        $d = [];
        $e = [];
        $f = [];
        if(!empty($a[0])){

            foreach($a as $v){
                if($v->id == 1){
                    $b[] = $v->id;
                }else if($v->id == 2){
                    $c[] = $v->id;
                }else if($v->id == 3){
                    $d[] = $v->id;
                }else if($v->id == 4){
                    $e[] = $v->id;
                }else if($v->id == 5){
                    $f[] = $v->id;
                }
            }
        }
        $cishu = [count($b),count($c),count($d),count($e),count($f)];
        
        $comments = Comment::orderBy('id','desc')
                ->where('shop_id',$id)
                ->paginate(2);

        //包装
        $pack = Pack::all();
        //口味
        $flavor = Flavor::all();
        //友情链接
        $links = Link::all();

        $setting = Setting::all();

        //获取当前登录人的信息
        $user = null;
        if(\Session::has('homeUser')){
            $id = \Session::get('homeUser')['id'];
            $user = User::find($id);
            
            //获取当前登录人的地址信息
            if(empty($user->uaddress[0])){
                $address = '山西省-吕梁市-孝义市';
                $add = explode('-',$address);
            }else{
                $address = $user->uaddress[0]['address'];
                $add = explode('-',$address);
            }
        }
        $setting = Setting::first();
        //推荐商品
        $recom = Shop::where('recom','1')->take(3)->orderBy('id','desc')->get();

        return view('home.shop.index',compact('shop','comment','comments','pack','flavor','recom','cates','links','add','user','hao','zhong','cha','bilv','ptags','count','setting','cishu'));


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
        $packs = Pack::all();
        $shop = Shop::findOrFail($id);
        return view('admin.shop.edit',compact('shop','tags','cates','flavors','packs'));
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
                $guo = $shop->packs()->sync($request->pack_id);
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


    public function delete()
    {
        dd(111);
    }
}
