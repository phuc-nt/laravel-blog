<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Post;
use DB;

class BlogController extends Controller
{
    public function getIndex()
    {
    	// get all Posts by paginate 10
    	$posts = Post::orderBy('created_at', 'desc')->paginate(10);

    	// return the view and pass in all Posts
    	return view('blog.index')->with('posts', $posts);
    }
 
    public function getSingle($slug)
    {
        // get Post by slug
        //$post = DB::table('posts')->where('slug', '=', $slug)->first();
        $post = Post::where('slug', '=', $slug)->first();

        // return the view and pass in the post object
        return view('blog.single')->with('post', $post);
    }
}
