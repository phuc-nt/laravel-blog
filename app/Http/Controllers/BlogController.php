<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Post;
use DB;

class BlogController extends Controller
{
    public function getSingle($slug)
    {
        // get Post by slug
        //$post = DB::table('posts')->where('slug', '=', $slug)->first();
        $post = Post::where('slug', '=', $slug)->first();

        // return the view and pass ins the post object
        return view('blog.single')->with('post', $post);
    }
}
