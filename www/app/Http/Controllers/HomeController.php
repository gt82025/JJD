<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use Mail;
use Session;
//use App\Http\Controller;
use App\Http\Controllers\Controller;
use App\Model\Meta;
use App\Model\Post;
use App\Model\Product;
use App\Model\ProductCategory;
use App\Model\Contact;
use App\Model\Banner;
use App\Model\Social;


//use App\Task;

class HomeController extends Controller
{
    public function showEbook(){
        $meta = Meta::find(1);

        return view('front.ebook',
        	[
        		'meta' => $meta,     
        	]

        );
    }
    
    public function showRelationshipForm(){
        $meta = Meta::find(1);
        $social = Social::where('published', 1)->orderBy('sort', 'asc')->get();
       
        return view('front.relationship',
        	[
        		'meta' => $meta,
                'social' => $social,
        	]

        );
    }

    public function index(){
        $meta = Meta::find(1);
        $post = Post::where('published', 1)->orderBy('publish_at', 'desc')->first();
        $banner = Banner::where('published', 1)->orderBy('publish_at', 'desc')->get();
        $social = Social::where('published', 1)->orderBy('sort', 'asc')->get();
       
        return view('front.index',
        	[
        		'meta' => $meta,
                'post' => $post,
                'banner' => $banner,
                'social' => $social,
        	]

        );
    }

    public function showReservationForm(){
        $meta = Meta::find(1);
        $social = Social::where('published', 1)->orderBy('sort', 'asc')->get();
       
        return view('front.reservation',
        	[
        		'meta' => $meta,
                'social' => $social,
        	]

        );
    }

    public function reservation(Request $request){

        $data = new Contact;
        $data->send_time = date("Y-m-d h:i:s");
        $data->name = $request->name;
        $data->phone = $request->phone;
        $data->reserve = $request->reserve;
        $data->remark = $request->subject;
        $data->save();

		$result = [
			'send_time'=>$data->send_time,
			'name'=>$data->name,
			'phone'=>$data->phone,
			'reserve'=>$data->reserve,
			'remark'=>$data->remark,
        ];
        
        $from = ['email'=>'no-reply@jinjind.com',
			'name'=>'金錦町 Jin Jin Ding 自動回覆',
			'subject'=>'預約訂製 - 金錦町 Jin Jin Ding '
		];

		//填寫收信人信箱
		$to = ['email'=>'service@jinjind.com','name'=>'金錦町 | Jin Jin Ding 線上客服'];
		//信件的內容(即表單填寫的資料)
		
		//寄出信件
		if($data->id)
		Mail::send('emails.contact', $result, function($message) use ($from, $to) {
			$message->from($from['email'], $from['name']);
			$message->to($to['email'], $to['name'])->cc('linus73921@gmail.com')->subject($from['subject']);
        });
        $status = '感謝您的來信預約,我們將盡快請專員與您聯絡';
        return redirect('reservation')->with('status', $status);
       
    }
}
