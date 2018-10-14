<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
//use App\Http\Controller;
use App\Http\Controllers\Controller;
use App\Model\Meta;
use App\Model\Post;
use App\Model\PostCategory;
//use App\Model\Tag;
//use App\Task;

class PostController extends Controller
{   

    public function index($id = null){
        $meta = Meta::find(1);
        $footer_post = Post::where('published', 1)->with('category')->orderBy('published_at','desc')->take(5)->skip(0)->get();
        $title = '闆娘日誌';
		$category_id = $id;
        $page = isset($_GET['page'])?$_GET['page']:1;
        $num = 5; 
        //$pagenum = 6; 
        $limit_start = ($page-1)*$num; 
        //$start = (int)(($page-1) / $pageNum) * $pageNum + 1; 
        //$end = $start + $pageNum -1; 
        
        $posts_count = $id?
            Post::where('published', 1)->with('category')->where('category_id','=',$id)->orderBy('published_at','desc')->get()->count():
            Post::where('published', 1)->with('category')->orderBy('published_at','desc')->get()->count();
   
        $pages = ceil($posts_count/$num); 
        $next = ($page+1 > $pages)?$pages:$page+1; 
        $pre = ($page-1 < 1)?1:$page-1;
       
        $categories = PostCategory::all(); 
        $posts = $id?
            Post::where('published', 1)->with('category')->where('category_id','=',$id)->orderBy('published_at','desc')->take($num)->skip($limit_start)->get():
            Post::where('published', 1)->with('category')->orderBy('published_at','desc')->take($num)->skip($limit_start)->get();
  
        $page_tag = array();
        for ($i=1; $i <= $pages; $i++) { 
            array_push($page_tag, $i);
        }
        $category = null;
        foreach ($categories as $k => $v) {
            # code...
            if($id == $v->id){
                $categories[$k]->active = true;
                $title = $v->name;
                $category = $v;
            }
            
        }
        
		return view('front.post.index',
        	[
        		'meta' => $meta,
                'categories' => $categories,
                'category' => $category,
				'posts' => $posts,
                'title' => $title,
                'page_tag' => $page_tag,
                'pre' => $pre,
                'next' => $next,
                'page' => $page,
                'category_id' => $category_id,
                'footer_post' => $footer_post
        	]
        ); 
    }
	
	public function inner($id){
        $meta = Meta::find(1);
        $footer_post = Post::where('published', 1)->with('category')->orderBy('published_at','desc')->take(5)->skip(0)->get();
        $categories = PostCategory::all(); 
        $post = Post::find($id);
        $category = null;
        foreach ($categories as $k => $v) {
            # code...
            if($post->category_id == $v->id){
                $categories[$k]->active = true;
                $category = $v;
            }
            
        }
        
		return view('front.post.inner',
        	[
        		'meta' => $meta,
                'categories' => $categories,
                'category' => $category,
				'post' => $post,
                'footer_post' => $footer_post
        	]
        ); 
    }
	
}
