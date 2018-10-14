<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
//use App\Http\Controller;
use App\Http\Controllers\Controller;
use App\Model\Meta;
use App\Model\Social;
use App\Model\ProductCategory;
use App\Model\Product;
use App\Model\ProductSpec;

//use App\Model\Tag;
//use App\Task;

class ProductController extends Controller
{   
	public function showProductInside(){

		$result = Product::where('published', 1)->where('name', '幾何慕斯蛋糕')->first();
		return Product::where('published', 1)->whereIn('id', explode(',',$result->inside))->with('category')->get();
	
	}
	
	public function showProductInner($id){
		$meta = Meta::find(1);
		$social = Social::where('published', 1)->orderBy('sort', 'asc')->get();
	
		if(!$id)return 404;
		
		$result = Product::with(['category','spec' => function($query){
			$query->where('published', 1)->orderBy('sort','asc');
		}])->where('published', 1)->find($id);
		$result->album = explode(',',$result->album);
		$result->picks = Product::where('published', 1)->whereIn('id', explode(',',$result->pick))->with('category')->get();
		
		$meta->image = $result->cover;
		$meta->description = $result->intro?$result->intro:$meta->description;
		
		return view('front.product.inner',
        	[
				'meta' => $meta,
				'social' => $social,
				'result' => $result,
				
        	]
        );  
    }

	public function showProduct(){
		$meta = Meta::find(1);
		$social = Social::where('published', 1)->orderBy('sort', 'asc')->get();

		$category = ProductCategory::where('published',1)->with(['product' => function($query){
			$query->where('published',1)->orderBy('publish_at','desc');
		}])->get();

		$item7 = [];
		foreach($category as $k => $v){
			
			switch ($v->name) {
				case '金箔蜂蜜蛋糕':
					# code...
					$item1 = $v;
				break;

				case '土鳳梨酥':
				# code...
					$item2 = $v;
				break;

				case '琥珀糖':
				# code...
					$item3 = $v;
				break;

				case '組合禮盒':
				# code...
				 	$item4 = $v;
				break;

				case '幾何蛋糕':
				# code...
					$item5 = $v;
					foreach ($item5->product as $k2 => $v2) {
						# code...
						$item5->product[$k2]['cover_bg'] = $v2->cover_bg?$v2->cover_bg:$v2->background;
					}
				break;

				case '幾何慕斯蛋糕(三入裝)':
				# code...
				$item6 = $v;
				break;

				default:
					# code...
					array_push($item7,$v);
				break;
			}
		}

		return view('front.product.index',
        	[
				'meta' => $meta,
				'social' => $social,
				'item1' => $item1,
				'item2' => $item2,
				'item3' => $item3,
				'item4' => $item4,
				'item5' => $item5,
				'item6' => $item6,
				'item7' => $item7
				
        	]
        ); 
    }

	


	
	
}
