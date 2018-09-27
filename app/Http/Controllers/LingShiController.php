<?php

namespace App\Http\Controllers;

use App\Shop;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Intervention\Image\ImageManagerStatic as Image;

class LingShiController extends Controller
{
    public function single($url)
    {
    	// $url = 'http://www.lingshi.com/product/lingshi-11629.htm';
    	preg_match('/lingshi-(.*).htm/isU', $url, $id);
    	// http://www.lingshi.com/product/lingshi-11626.htm
    	// dd($id[1]);
    	//实例化对象
		$client = new \GuzzleHttp\Client();

		//发送 GET 请求
		$res = $client->request('GET', $url);

		//获取响应状态码
		$code = $res->getStatusCode();

		if($code == 200){
			$type = $res->getHeader('content-type');
            $parsed = Psr7\parse_header($type);
            // dd($parsed);
            $original_body = (string)$res->getBody();
            // dd($original_body);
            $body = mb_convert_encoding($original_body, "UTF-8", "GBK");
            //获取标题
			preg_match('/<h3 class="name">(.*)<\/h3>/isU', $body, $sname);
			// dd($sname);
			//获取价格
			preg_match('/<span id="shopprice">(.*)<\/span>/isU', $body, $sprice);
			// dd($sprice);
			//商品主图
			preg_match('/<img class="bzoom" src="(.*)" width="460" height="460" \/>/isU', $body, $simage);
			try{
				$img = file_get_contents($simage[1]);
				$filename = './uploads/shujuimages/';
				$time = date('Ymd');
				$path = $filename.$time.rand(10000000,99999999).'.jpg';
				file_put_contents($path,$img);
				$newpath = $filename.$time.'s_'.rand(10000000,99999999).'.jpg';
				Image::make($path)->resize(1024, 866, function ($constraint) {$constraint->aspectRatio();})->save($newpath);
				$arr = explode('/',$newpath);
				$arr2 = array_shift($arr);
				$newpath2 = implode('/',$arr);
				$newpath3 = '/'.$newpath2;
			}catch(\Exception $e) {
        		Log::info($e->getMessage());
        		// continue;
        	}
			// dd($newpath3);
			// dd(11);
			// dd($simage);
			//商品规格
			preg_match('/<td>毛重: (.*)<\/td>/isU', $body, $guige);
			// dd($guige);
			//食用方法
			preg_match('/<td>食用方法：(.*)<\/td>/isU', $body, $eat);
			// dd($eat);
			//生产日期
			preg_match('/<td>生产日期：(.*)<\/td>/isU', $body, $shengchan);
			// dd($shengchan);
			//保质期
			preg_match('/<td>保质期：(.*)<\/td>/isU', $body, $date);
			// dd($date);
			//储存方法：
			preg_match('/<td>储存方法：(.*)<\/td>/isU', $body, $save);
			// dd($save);
			//产地
			// preg_match('/<a href="(.*)"><em>(.*)<\/em><\/a>/isU', $body, $place);//要2
			// dd($place);
			//详情图片
			// preg_match('/<td><p style="text-align: center;">(.*)<img src="(.*)" align="middle" alt="(.*)" title="(.*)" \/><\/p><\/td>/isU', $body, $xqtp);
			// dd($xqtp);
            // return $body;
            try{
	            $shop = new Shop;
	        	$shop -> sname = $sname[1];
	        	$shop -> sprice = $sprice[1];
	        	$shop -> guige = $guige[1];
	        	$shop -> biaozhun = 'GB/T'.rand(10000,20000);
	        	$shop -> shengchan = '2018-0'.rand(1,9);
	        	$shop -> eat = '开袋即食';
	        	$shop -> save = '防置阴凉干燥处';
	        	$shop -> recom = 0;
	       	 	$shop -> date = rand(1,12).'个月';
	        	$shop -> peiliao = '食用盐 食用油 香料';
	        	$shop -> place = '山西省吕梁市';
	        	$shop -> yplace = '巴基斯坦';
	        	$shop -> cate_id = rand(1,10);
	        	$shop -> scount = rand(100,300);
	        	$shop -> msales = rand(10,30);
	        	$shop -> csales = rand(100,300);
	            $shop -> simage = $newpath3;
	            $shop -> simage1 = '/uploads/shopimages/'.rand(1,38).'.jpg';
	        	$shop -> simage2 = '/uploads/shopimages/'.rand(1,38).'.jpg';
	        	$shop -> save();
        	}catch(\Exception $e) {
        		Log::info($e->getMessage());
        	}
		}else{
			return 'empty';
		}
    }


    public function list(Client $client)
    {
    	set_time_limit(0);
    	
    	for($i=2;$i<=15;$i++){
		    $url = "http://www.lingshi.com/list/y".$i.".htm";
    		try{
				$res = $client->request('GET', $url);
			}catch(\Exception $e) {
	        	Log::info($e->getMessage());
	        	Log::info('error-url:'.$url);
	        	continue;
	    	}	
	    	//提取内容
	    	$type = $res->getHeader('content-type');
            $parsed = Psr7\parse_header($type);
            // dd($parsed);
            $original_body = (string)$res->getBody();
            // dd($original_body);
            $body = mb_convert_encoding($original_body, "UTF-8", "GBK");
	    	// echo ($body);die;
	    	preg_match_all('/<li>\s+<a class="img" title="(.*)" target="_blank" href="(.*)">/isU', $body, $urls);
	    	// dd($urls);
	    	// dd($urls);
	    	if(empty($urls[2])) return;

	    	foreach ($urls[2] as $key => $value) {
	    		$this->single($value);
	    	}
    	}
    }

}
