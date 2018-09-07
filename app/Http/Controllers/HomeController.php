<?php

namespace App\Http\Controllers;

use App\Cate;
use App\Link;
use App\Shop;
use App\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * 前台首页
     */
    public function index()
    {	
    	$cates = Cate::all();
    	$tags = Tag::all();
    	$links = Link::all();
    	$recom = Shop::where('recom','1')->take(3)->orderBy('id','desc')->get();
    	$shops = Shop::all();
    	$a = 1;
    	$cid = Cate::pluck('id');
    	return view('home',compact('cates','tags','links','recom','shops','a','cid'));
    }

}
