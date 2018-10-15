<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use DB;
use Session;
use Validator;
use Crypt;
use Mail;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CartPluginController;
use App\Http\Controllers\AioSDK\CreateOrder;
//use App\Http\Controllers\AioSDK\ChoiceMap;
use App\Model\Post;
use App\Model\Meta;
use App\Model\Social;
use App\Model\Product;
use App\Model\ProductCategory;
use App\Model\ProductSpec;
use App\Model\Ship;
use App\Model\Order;
use App\Model\OrderDetail;
use App\Model\UserCategory;
use App\Model\User;
use App\Model\Coupon;
//use App\Task;

class CartController extends Controller
{   
	public function showProductContent2($id){
		//$result = Product::where('published', 1)->where('name', '幾何慕斯蛋糕')->first();
		
		//$cart = Session::get('cart');
		$result = OrderDetail::find($id);
		
		
		$detail = json_decode($result['detail']);
		foreach ($detail as $k => $v) {
			//$detail[$k]->inside0->info = '1';
			$detail[$k]->inside0->info = Product::where('published', 1)->where('id', $v->inside0->id )->first();
			$detail[$k]->inside1->info = Product::where('published', 1)->where('id', $v->inside1->id )->first();
			$detail[$k]->inside2->info = Product::where('published', 1)->where('id', $v->inside2->id )->first();
			$detail[$k]->inside3->info = Product::where('published', 1)->where('id', $v->inside3->id )->first();
			//$detail[$k]['inside1']['info'] = isset($detail[$k]['inside1']['info'])?$detail[$k]['inside1']['info']:Product::where('published', 1)->where('id', $v['inside1']['id'])->first();
			//$detail[$k]['inside2']['info'] = isset($detail[$k]['inside2']['info'])?$detail[$k]['inside2']['info']:Product::where('published', 1)->where('id', $v['inside2']['id'])->first();
			//$detail[$k]['inside3']['info'] = isset($detail[$k]['inside3']['info'])?$detail[$k]['inside3']['info']:Product::where('published', 1)->where('id', $v['inside3']['id'])->first();
		}
	
		//Session::put('cart', $cart);
		return $detail;
		
	}

	public function showProductContent($sort){
		//$result = Product::where('published', 1)->where('name', '幾何慕斯蛋糕')->first();
		//$result = Product::where('published', 1)->whereIn('id', explode(',',$result->inside))->with('category')->get();
		$cart = Session::get('cart');
		$detail = $cart[$sort]['content_detail'];
		foreach ($detail as $k => $v) {
			$detail[$k]['inside0']['info'] = isset($detail[$k]['inside0']['info'])?$detail[$k]['inside0']['info']:Product::where('published', 1)->where('id', $v['inside0']['id'])->first();
			$detail[$k]['inside1']['info'] = isset($detail[$k]['inside1']['info'])?$detail[$k]['inside1']['info']:Product::where('published', 1)->where('id', $v['inside1']['id'])->first();
			$detail[$k]['inside2']['info'] = isset($detail[$k]['inside2']['info'])?$detail[$k]['inside2']['info']:Product::where('published', 1)->where('id', $v['inside2']['id'])->first();
			$detail[$k]['inside3']['info'] = isset($detail[$k]['inside3']['info'])?$detail[$k]['inside3']['info']:Product::where('published', 1)->where('id', $v['inside3']['id'])->first();
		}
		$cart[$sort]['content_detail'] = $detail;
		Session::put('cart', $cart);
		return $detail;
	
	}

	public function allPayReturn(Request $request){
		if(!Session::has('cart') || count(Session::get('cart')) < 1 )
		return redirect('products');
		$meta = Meta::find(1);
		$social = Social::where('published', 1)->orderBy('sort', 'asc')->get();
		//$footer_post = Post::where('published', 1)->with('category')->orderBy('published_at','desc')->take(5)->skip(0)->get();
		$order = Session::get('order'); 
	
		$order = Order::where('order_number', $order['order_number'])->first();
	
		$order->MerchantTradeNo = $request->MerchantTradeNo; //特店交易編號
		$order->RtnCode = $request->RtnCode == 1?'刷卡成功':'刷卡失敗'; //交易狀態
		$order->RtnMsg = $request->RtnMsg; //交易訊息
		$order->TradeNo = $request->TradeNo; //綠界的交易編號
		$order->TradeAmt = $request->TradeAmt; //交易金額
		$order->PaymentDate = $request->PaymentDate; //付款時間
		$order->PaymentType = $request->PaymentType; //付款時間
		$order->save();
	
		//$order->payment_result = $order->payment_code;
		//$order = Session::get('order'); 
		/*
		MerchantID: "2000132",
		MerchantTradeNo: "JID1537082801",
		PaymentDate: "2018/09/16 15:28:59",
		PaymentType: "Credit_CreditCard",
		PaymentTypeChargeFee: "1",
		RtnCode: "1",
		RtnMsg: "Succeeded",
		SimulatePaid: "0",
		StoreID: null,
		TradeAmt: "4280",
		TradeDate: "2018/09/16 15:26:41",
		TradeNo: "1809161526410023",
		CheckMacValue: "2390514EFDD95A467E7722B4F8BB11FC2C2ECAF20009538E097AB6B5B0A753F1"
		if($request->RtnCode == 1){
			$bonus = Bonus::where('published',0)->where('order_id',$order->id)->first();
			if(isset($bonus->published)){
				$bonus->published = 1;
				$bonus->save();
			}
		}
		*/
		

		$data = [
			'name' => $order->name,
			'email' => $order->email,
			'order_number' => $order->order_number,
			'payment_date' => $order->PaymentDate,
			'payment_type' => $order->PaymentType,
			'payment_result' => $order->RtnCode,
			'merchant_trade' => $order->MerchantTradeNo,
			'total' => $order->TradeAmt
		];
		$from = ['email'=> 'no-reply@jinjind.com',
					'name'=> '金錦町 JIN JIN DING 線上自動回覆',
					'subject'=>'感謝您 使用金錦町 JIN JIN DING線上訂購優質商品'
				];
			
				//return $order;	

		$from = ['email'=> 'no-reply@jinjind.com',
			'name'=> '金錦町 JIN JIN DING 線上自動回覆',
			'subject'=>'訂單編號：'.$order->order_number.'匯款確認通知'
		];
		//填寫收信人信箱
		$to = ['email'=>$data['email'],'name'=>$data['name']];
		//信件的內容(即表單填寫的資料)
		//寄出信件
		Mail::send('emails.checkout', $data, function($message) use ($from, $to) {
			$message->from($from['email'], $from['name']);
			$message->to($to['email'], $to['name'])->cc($from['email'])->subject('感謝您 使用金錦町 JIN JIN DING線上訂購優質商品');
		});


		Session::forget('bill');
		Session::forget('cart');
		Session::forget('order');
        return view('front.shop.complete',
            [
                'meta' => $meta,
				'social' => $social,
				'order' => $order
            ]

        );
	}


	public function checkCheckout(){
		$order = Session::get('order');
		$plugin = new CartPluginController;
		$order['merchant_trade'] = "JID".time();
		//return $order;
		$order['order_number'] = $order['order_number']?$order['order_number']:$plugin->orderNumber();
	
		$user = Auth::user();
		$data = Order::where('order_number', $order['order_number'])->first();
		$data = $data?$data:new Order;
		$data->order_date = date('Y/m/d H:i:s'); //訂單日期
		$data->order_number	= $order['order_number'];//訂單編號
		$data->user_id = $user->id;	//會員ID
		$data->name = $order['name'];	//姓名
		$data->title = $order['title'];//稱謂
		$data->email = $order['email'];//email
		$data->tel = $order['tel'];//電話
		$data->phone = $order['phone'];//手機
		$data->address = $order['address'];//地址
		$data->to_name = $order['to_name'];//收件姓名
		$data->to_title = $order['to_title'];//;收件稱謂
		$data->to_email = $order['to_email'];//收件email
		$data->to_tel = $order['to_tel'];//收件電話
		$data->to_phone = $order['to_phone'];//收件手機
		$data->to_address = $order['to_address'];//收件地址
		$data->invoice = $order['invoice'];//發票號碼
		$data->invoice_number= $order['uniform'];
		$data->invoice_name = $order['uniform_name'];//發票收件人
		$data->invoice_address = $order['uniform_address'];//發票地址
		$data->ship_time = $order['ship_time'];//收件時間
		if(isset($order['discount']))$data->coupon = $order['discount']['code'];//折扣金額
		$data->discount = $order['bill']['discount'];//折扣金額
		

		$data->subtotal = $order['bill']['subtotal'];//小計
		$data->shipping_fee = $order['bill']['freight_normal'];//常溫運費
		$data->shipping_fee_temp = $order['bill']['freight_special'];//常溫運費
		$data->total = $order['bill']['total'];//總計
		$data->MerchantTradeNo = $order['merchant_trade'];
		$data->save();

		foreach ($order['cart'] as $k => $v) {
			$detail = OrderDetail::where('spec_id',$v['id'])->where('order_id',$data->id)->first();
			$detail = $detail?$detail:new OrderDetail;
			$detail->published = 1;
			$detail->category_id = $v['product']['id'];
			$detail->order_date = $data->order_date;
			$detail->order_id = $data->id;
			$detail->product_id = $v['product']['id'];
			$detail->spec_id = $v['id'];
			$detail->name = $v['product']['name'];
			$detail->selling = $v['price'];
			$detail->qty = $v['qty'];
			$detail->total = $v['total'];
			$detail->detail = isset($v['content_detail'])?json_encode($v['content_detail']):null;
			$detail->save();
		}
		Session::put('order', $order);
		

		$from = ['email'=> 'no-reply@jinjind.com',
					'name'=> '金錦町 JIN JIN DING 線上自動回覆',
					'subject'=>'感謝您 使用金錦町 JIN JIN DING線上訂購優質商品'
				];
			
				//return $order;	
				
		//填寫收信人信箱
		$to = ['email'=>$data['email'],'name'=>$data['name']];
		//信件的內容(即表單填寫的資料)
		//寄出信件
		Mail::send('emails.order', $order, function($message) use ($from, $to) {
			$message->from($from['email'], $from['name']);
			$message->to($to['email'], $to['name'])->cc($from['email'])->subject('感謝您 使用金錦町 JIN JIN DING線上訂購優質商品');
		});
		return new CreateOrder();
	}
	
	public function showCheckoutForm(){
		if(!Session::has('cart') || count(Session::get('cart')) < 1 )
		return redirect('products');

		$order = Session::get('order');
		//if(!$order['to_name'])return $order['to_name'];
		//return $order;
		$meta = Meta::find(1);
		$social = Social::where('published', 1)->orderBy('sort', 'asc')->get();
		$cart = Session::get('cart');
		
        //$cart = Session::get('cart'); 
		//$bill = Session::get('bill'); 
        return view('front.shop.checkout',
            [
                'meta' => $meta,
				'social' => $social,
				'cart' => $cart, 
				'order' => $order,
			
            ]

        );
    }

	public function showPaymentForm(){
		if(!Session::has('cart') || count(Session::get('cart')) < 1 )
		return redirect('products');
        $meta = Meta::find(1);
		$social = Social::where('published', 1)->orderBy('sort', 'asc')->get();
		
		$user = Auth::user();
		if($user)$user->category = UserCategory::find($user->category_id);
	
		$cart = Session::get('cart'); 

        //foreach ($bonus as $k => $v) {
            # code...
        //    $total = $total + $v->get_bonus - $v->use_bonus;
        //}
		$order = Session::get('order');
		if(isset($order['discount'])){
			$plugin = new CartPluginController;
			$bill = $plugin->total(Session::get('cart'),$order['discount']); 
		}
		$order['bill'] = Session::get('bill');
		
		Session::put('order',$order);
	
        //$cart = Session::get('cart'); 
		//$bill = Session::get('bill'); 
        return view('front.shop.payment',
            [
				'meta' => $meta,
				'social' => $social,
				//'product_categories' => $product_categories, 
				'cart' => $cart, 
				'order' => $order,
				'user' => $user
            ]

        );
    }

	public function checkDelivery(Request $request){
		
		$order = Session::get('order'); 
		$plugin = new CartPluginController;
		$order['order_number'] = isset($order['order_number'])?$order['order_number']:'';
		$order['order_number'] = $order['order_number']?$order['order_number']:$plugin->orderNumber();
		$order['name'] = $request->name;
		$order['title'] = $request->title?$request->title:'先生';
	
		$order['address'] = $request->city.''.$request->area.''.$request->address;
		//$order['tel_area'] = $request->tel_area;
		$order['tel'] = $request->tel_area.''.$request->tel;
		$order['phone'] = $request->phone;
		$order['email'] = $request->email;

		$order['to_name'] = $request->to_name;
		$order['to_title'] = $request->to_title?$request->to_title:'先生';

		$order['to_address'] = $request->to_city.''.$request->to_area.''.$request->to_address;
		//$order['to_tel_area'] = $request->to_tel_area;
		$order['to_tel'] = $request->to_tel_area.''.$request->to_tel;
		$order['to_phone'] = $request->to_phone;
		$order['to_email'] = $request->to_email;
		$order['ship_time'] = $request->ship_time; 
		$order['invoice'] = $request->invoice;
		$order['uniform'] = $request->uniform;
		$order['uniform_name'] = $request->uniform_name;
		$order['uniform_address'] = $request->uniform_address;

	
		Session::put('order', $order);
		return redirect('checkout');
	}

	public function showDeliveryForm(){
		if(!Session::has('cart') || count(Session::get('cart')) < 1 )
		return redirect('product');
		
		
		//超商取貨
		$meta = Meta::find(1);
		$social = Social::where('published', 1)->orderBy('sort', 'asc')->get();
		//$product_categories = ProductCategory::where('published', 1)->orderBy('sort', 'asc')->get();
		$plugin = new CartPluginController;
		$bill = $plugin->total(Session::get('cart')); 
		$cart = Session::get('cart');
		$order = session::get('order');
		
		
		
		//if (Auth::check()) {
			// 這個使用者已經登入...
			$user = Auth::user();
		//	$order['to_name'] = isset($order['to_name'])?$order['to_name']:$user->name;
		//	$order['to_address'] = isset($order['to_address'])?$order['to_address']:$user->address;
		//	$order['to_tel'] = isset($order['to_tel'])?$order['to_tel']:$user->phone;
		//	$order['to_phone'] = isset($order['to_phone'])?$order['to_phone']:$user->phone;
		//	$order['to_email'] = isset($order['to_email'])?$order['to_email']:$user->email;
		//}else{
			$order['tel'] = isset($order['tel'])?$order['tel']:'';
			$order['address'] = isset($order['address'])?$order['address']:'';
			$order['to_name'] = isset($order['to_name'])?$order['to_name']:'';
			$order['to_address'] = isset($order['to_address'])?$order['to_address']:'';
			$order['to_tel'] = isset($order['to_tel'])?$order['to_tel']:'';
			$order['to_phone'] = isset($order['to_phone'])?$order['to_phone']:'';
			$order['to_email'] = isset($order['to_email'])?$order['to_email']:'';
		//}
		//$bonus = Bonus::with('order')->where('published',1)->where('user_id',$user->id)->orderBy('published_at','desc')->get();
		
		//$total = 0;
        //foreach ($bonus as $k => $v) {
            # code...
        //    $total = $total + $v->get_bonus - $v->use_bonus;
        //}
		
		
		 
	
		//$order['bonus'] = $total;
		//Session::put('order',$order);
		//return $order;
        return view('front.shop.delivery',
            [
				'meta' => $meta,
				'social' => $social,
				'order' => $order,
				'cart' => $cart, 
				'bill' => $bill,
				'user' => $user
            ]
        );
    }

	public function checkCart(Request $request){

		if(!Session::has('cart') || count(Session::get('cart')) < 1 )
		return redirect('products');
		
		$meta = Meta::find(1);
		$cart = Session::get('cart'); 
		$qty = 0;

		foreach ($cart as $k => $v) { 
			$qty = $request->qty[$k] ? $request->qty[$k] : 1;
			$qty = $request->qty[$k] < 1 ? 1 : $qty;
			$qty = $request->qty[$k] > 500 ? 500 : $qty;
			$cart[$k]->qty = $qty; 
		}
		$order = [];
		$order['cart'] = $cart;
		//確認運送
		if($request->coupon){
			$dt = date('Y-m-d');
			$discount = Coupon::where('published',1)
			->where('code',$request->coupon)
			->where('start_on','<=',$dt)
			->where('end_on','>=',$dt)
			->first();

			if(!$discount)return redirect('cart')->with('status', '查無此優惠代碼或已經過期');
			$order['discount'] = $discount;
		}
		
		//$ship = Ship::find($request->ship);

		//確認紅利
		/*
		$user = Auth::user();
		$bonus = Bonus::with('order')->where('user_id',$user->id)->orderBy('published_at','desc')->get();
		$total = 0;
        foreach ($bonus as $k => $v) {
            # code...
            $total = $total + $v->get_bonus;
            $total = $total - $v->use_bonus;
        }
		$bonus = $request->bonus ? $request->bonus : 0;
		$bonus = $request->bonus < 0 ? 0 : $bonus;
		$bonus = $request->bonus > $total ? $total : $bonus;
		*/
		//$bonus = 0;
		//重新計算金額
		//$plugin = new CartPluginController;
		//$bill = $plugin->total($cart,$ship,$bonus); 

		//建立訂單
		
		//$order['bill'] = $bill;
		//$order['ship'] = $ship;
		Session::put('order', $order);
		Session::put('cart', $cart);
		return redirect('payment');
	
		
	}

	public function checkCartQty(Request $request){
		$cart = Session::get('cart');
		$qty = 0;

		foreach ($cart as $k => $v) { 
			$qty = $request->qty[$k] ? $request->qty[$k] : 1;
			$qty = $request->qty[$k] < 1 ? 1 : $qty;
			$qty = $request->qty[$k] > 500 ? 500 : $qty;
			$cart[$k]['qty'] = $qty; 
		}
		Session::put('cart', $cart);
		//return $cart;
		return redirect('cart');
	
	}

	public function showCartForm(Request $request){

		if(!Session::has('cart') || count(Session::get('cart')) < 1 )
		return redirect('products');
		$ship_normal = Ship::where('published', 1)->where('category_id', 1)->orderBy('condition', 'asc')->get();
		$ship_special = Ship::where('published', 1)->where('category_id', 2)->orderBy('condition', 'asc')->get();
		
		$meta = Meta::find(1);
		$social = Social::where('published', 1)->orderBy('sort', 'asc')->get();
		$plugin = new CartPluginController;
		$bill = $plugin->total(Session::get('cart')); 
		$cart = Session::get('cart');
		
		if($request->all()){
			
			foreach ($cart as $k => $v) {
				# code...
				$cart[$k]->qty = $request->qty[$k];
			}
		}
		
        return view('front.shop.cart',
            [
				'meta' => $meta,
				'social' => $social,
				'bill' => $bill,
				'cart' => $cart,
				'ship_normal' => $ship_normal,
				'ship_special' => $ship_special,
				
            ]

        );
	}

	public function removeToCart(Request $request){
		//$post = array_map('trim', $_POST);
		//return $request->count;
		$cart = Session::get('cart');  
		//$alert = "已從購物車移出".$cart[$request->count]['product']['name']; 
		foreach ($cart as $k => $v) {
			# code...
			if($request->id == $v->id)unset($cart[$k]);
		}
		//unset($cart[$request->count]);
		$cart = array_values($cart);
		//$_SESSION['cart_count']= count($_SESSION['cart']); 
		Session::put('cart', $cart);  
		$cart = Session::get('cart');  
		//$plugin = new CartPluginController;
		//$total = $plugin->total($cart);
        //$url = 'reload';
		//$value = array('notice' => $alert,'url' =>$url ,'cart' => $cart); 
        //return Session::get('cart'); 
		  
		   //return json_encode($value);
		return array(
			'count' => count(Session::get('cart')),
			'notice' => '已加入購物車',
			'reload' => 'cart'
		);
	}

	public function addToCart(Request $request){
		
		//return $request->size;
		$has = false; 
		$data = ProductSpec::with(['product'=> function($query){
			$query->with('category');
		}])->where('id', $request->size)->first();
		$cart = Session::has('cart')? Session::get('cart'):[]; //確認資料
		foreach ($cart as $k => $v) { 
			if ($v['id'] == $data['id']) { 
				$cart[$k]['qty'] = $request->quantity; 
				$cart[$k]['content_detail'] = isset($request->content_detail)?$request->content_detail:null; 
				$has = true; 
			}
		} 
		if (!$has) { 
			$data->qty = $request->quantity;
			$data->content_detail = isset($request->content_detail)?$request->content_detail:null;
			$cart[] = $data; 
			
			Session::put('cart', $cart);
		} 
		//計算金額
		//$total = $plugin->total($cart);
		
		$status = 'done';
		$msg = '已加入購物車';
		//return back()->with($status, $msg);
		
		return array(
			'count' => count(Session::get('cart')),
			'notice' => '已加入購物車',
			'reload' => 'cart'
		);
        
	}

	

	
	
	

	
	
	//step2
	
	
	
	

	public function getCVSmap($store){
		switch ($store) {

				case 'uni':
				# code...
					return new \App\Http\Controllers\AioSDK\UniCvsMap;
				break;
			
			default:
					return new \App\Http\Controllers\AioSDK\FamiCvsMap;
				break;
		}
		
		//return $order;
	}

	public function ServerReplyURL(Request $request){
		
		$order = Session::get('order');
		$order['LogisticsSubType'] = $request->LogisticsSubType;
		$order['CVSStoreID'] = $request->CVSStoreID;
		$order['CVSStoreName'] = $request->CVSStoreName;
		$order['CVSAddress'] = $request->CVSAddress;
		$order['CVSTelephone'] = $request->CVSTelephone;
		Session::put('order',$order);
		return redirect('delivery');
		//return $order;
	}

	//step3
	
	
	
	

	
	protected function validator(array $data)
    {
        $messages = [
			'name.required' => '收件人為必填欄位',
            'email.email' => '電子郵件格式錯誤',
            'phone.required' => '手機為必填欄位',
            'address.required' => '地址為必填欄位',
        ];
        
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
        ],$messages);
    }

}
