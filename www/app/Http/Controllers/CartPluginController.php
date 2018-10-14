<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Auth;
//use App\Http\Controller;
use App\Http\Controllers\Controller;
use App\Model\Meta;
use App\Model\Slider;
use App\Model\ProductCategory;
use App\Model\ProductSpec;
use App\Model\ShipCategory;
use App\Model\Ship;
use App\Model\Order;
use App\Model\OrderNumber;
use App\Model\User;
//use App\Task;

class CartPluginController extends Controller
{   
	public function designDetail($cart)
	{
		
		$addSideQty = 0;
		$frontTextQty = 0;
		$leftTextQty = 0;
		$rightTextQty = 0;
		$backTextQty = 0;
		$imageQty = 0;
		$addRaised = 0;
		$addLight = 0;
		$strokeQty = 0;
		$strokeTotal = 0;
		
		foreach($cart as $k => $v){

			$addRaised += $v['raised_total']*$v->qty;;
			$addLight += $v['light_total']*$v->qty;;
			$strokeQty += $v['strokeQty']*$v->qty;;
			$strokeTotal += $v['strokeTotal']*$v->qty;;
			$imageQty +=  $v['image_qty']*$v->qty;;
			foreach($v->views as $k2 => $v2){

				if ($v2['title'] != '正面' && isset($v2['elements']) && count($v2['elements']) > 0) {
					$addSideQty += 1*$v->qty;
				}
				if(isset($v2['elements'])){
					foreach ($v2['elements'] as $k3 => $v3) {
				
						switch ($v3['type']){
							case 'text':
								//# code...
								switch ($v3['title']){
									case '正面':
									$frontTextQty += 1*$v->qty;
									break;
		
									case '反面':
									$backTextQty += 1*$v->qty;
									break;
		
									case '右邊':
									$rightTextQty += 1*$v->qty;
									break;
		
									case '左邊':
									$leftTextQty += 1*$v->qty;
									break;
								}
								
							break;
						}
					}
				}
				
				
			}
		}

		$total = [
			'addSideQty' => $addSideQty,
			'imageQty' => $imageQty,
			'frontTextQty' => $frontTextQty,
			'leftTextQty' => $leftTextQty,
			'rightTextQty' => $rightTextQty,
			'backTextQty' => $backTextQty,
			'addRaised' => $addRaised,
			'addLight' => $addLight,
			'strokeQty' => $strokeQty,
			'strokeTotal' => $strokeTotal,
		];
	

		return $total;
	}
	public function orderNumber()
	{
		
		$order = OrderNumber::where('number','like', date('Ymd')."%")->orderBy('id', 'asc')->get();
		$count = count($order);
		//$order = Order::select(DB::raw('count(id) as c'))->where('order_number','like', date('Ymd')."%")->get();
		//$number = date('Ymd').str_pad($count+1, 3, '0', STR_PAD_LEFT);
		$number = date('Ymd').str_pad($count+1, 3, '0', STR_PAD_LEFT);
		$data = new OrderNumber;
		$data->number = $number;
		$data->save();

		return $number;
	}

	public function checkViews($cart){
		$addList =[];
		$addTotal = 0;
		foreach($cart as $k => $v){
			$views = [];
			$typeImages = 0;
			$typeText = 0;
			foreach(json_decode($v->views,true) as $k2 => $v2){
				$elements = [];
				foreach($v2['elements'] as $k3 => $v3){
					if($k3 > 1){
						switch ($v3['type']) {
							case 'text':
								# code...
								if($v2['title'] != '正面'){
									$typeText ++;
								}
								
							break;

							case 'image':
								# code...
								$typeImages ++;
							break;

							default:
								# code...
								break;
						}
						$data = array(
							'title' => $v3['title'],
							'source' => $v3['source'],
							'type' => $v3['type']
						);
						array_push($elements,$data); 
					}
					
				}
				
				$views[] = array(
					'title' =>$v2['title'],
					'elements' =>$elements,
				);
			}
			
			$addList[$k]['add'] = $views;
			$addList[$k]['typeText'] = $typeText;
			$addList[$k]['addText'] = $typeText * $cart[$k]['product']['add_side'];
			$addList[$k]['typeImages'] = $typeImages;
			$addList[$k]['addImages'] = $typeText * $cart[$k]['product']['add_pic'];
			$addList[$k]['addTotal'] = $addList[$k]['addImages'] + $addList[$k]['addText'];
			$addTotal += $addList[$k]['addTotal'];
		}
		
		return array('addList'=> $addList ,'addTotal'=> $addTotal);
	}

	public function checkStock($stock,$orders){
		$list = [];
		$list['qty'] = 0;
		$list['pre_qty'] = 0;
		$list['sales'] = 0; //銷售數量
		$list['stock'] = 0;	//
		$list['pre_stock'] = 0;
		$list['total_stock'] = 0;

		foreach ($orders as $k => $v) {
			$list['sales'] += $v->qty;
		}
		foreach ($stock as $k => $v) {
			$list['qty'] += $v->qty;
			$list['pre_qty'] += $v->pre_qty;
			
		}
		if($list['sales'] > $list['pre_qty']){
			$list['pre_stock'] = 0 ;
			$remainder = $list['sales'] - $list['pre_qty'];
			$list['stock'] = $list['qty'] - $remainder;
		}else{
			$list['pre_stock'] = $list['pre_qty'] - $list['sales'];
			$list['stock'] = $list['qty'];
		}
		$list['total_stock'] = $list['stock'] + $list['pre_stock'];
		return $list;
    }

    public function total($cart, $ship = null, $bonus = null){
		//$user = Auth::user();
		//$user = User::with('category')->find($user->id);
		$specials_subtotal = 0;//特價品小計
		$general_subtotal = 0;//一般商品小計
		$subtotal = 0;//全部小計
		$total = 0;
		$bill = [];
		$bill['freight_normal']  = 0; //常溫運費
		$bill['freight_special'] = 0; //冷藏運費
		$bill['total_normal'] = 0; //常溫總計
		$bill['total_special'] = 0; //冷藏總計
		$total_price= 0;
		$ship_normal = Ship::where('published', 1)->where('category_id', 1)->orderBy('condition', 'asc')->get();
		$ship_special = Ship::where('published', 1)->where('category_id', 2)->orderBy('condition', 'asc')->get();
        foreach ($cart as $k => $v) { 
			//$discount_status = 'false';
			$cart[$k]->total = $v->price * $v->qty;
			$subtotal += $cart[$k]->total;
			if($v->product->temp == 0){
				$bill['total_normal'] += $cart[$k]->total;
			}
			if($v->product->temp == 1){
				$bill['total_special'] += $cart[$k]->total;
			}
		} 

		foreach ($ship_normal as $k => $v) {
			# code...
			if($bill['total_normal'] > $v->condition)
			$bill['freight_normal'] = $v->price;
		}

		foreach ($ship_special as $k => $v) {
			# code...
			if($bill['total_special'] > $v->condition)
			$bill['freight_special'] = $v->price;
		}
		
		$bill['subtotal'] =  $subtotal;

		//if($ship){
		//	$bill['freight'] = $subtotal > $ship->condition?0:$ship->price;
			//$bill['freight'] = $user->category->freight?0:$bill['freight']; //vip免運
		//}
		

		//if($bonus){
		//	$bill['use_bonus'] = $bonus>$bill['subtotal']-$bill['discount_total']?$bill['subtotal']-$bill['discount_total'] :$bonus;
		//}
		$bill['total'] =  $bill['subtotal']+$bill['freight_normal']+$bill['freight_special'];
		
        Session::put('cart', $cart);
		Session::put('bill', $bill);
		return $bill;
		
	}
	
	
	public function shipping($shipping){
		switch (ceil($shipping)) {
			case 0:
				$shipping = 0;
			break;

			case 1:
				$shipping = 160;
			break;
			
			case ($shipping > 1 && $shipping < 7):
				$shipping = 225;
			break;
			
			case ($shipping > 6 && $shipping < 11):
				$shipping = 290;
			break;
			
			case 11:
				$shipping = 450;
			break;
			
			case ($shipping > 11 && $shipping < 17):
				$shipping = 515;
			break;
			
			case ($shipping > 16 && $shipping < 21):
				$shipping = 580;
			break;
			
			case 21:
				$shipping = 740;
			break;
			
			case ($shipping > 21 && $shipping < 27):
				$shipping = 805;
			break;
			
			case ($shipping > 26 && $shipping < 31):
				$shipping = 870;
			break;
			
			case 31:
				$shipping = 1030;
			break;
			
			case ($shipping > 31 && $shipping < 37):
				$shipping = 1095;
			break;
			
			case ($shipping > 37 && $shipping < 41):
				$shipping = 1160;
			break;
			
			case 41:
				$shipping = 1320;
			break;
			
			case ($shipping > 41 && $shipping < 47):
				$shipping = 1385;
			break;
			
			case ($shipping > 47 && $shipping < 50):
				$shipping = 1450;
			break;
			
			case ($shipping > 50):
				$shipping = 1500;
			break;
			
			default:
				$shipping = 0;
		}
		
		return $shipping;
	}
	

}
