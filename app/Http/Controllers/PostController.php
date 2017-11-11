<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Post;
use App\Category;
use Session;

class PostController extends Controller
{
    // Check authen, just logged in user can access
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all Posts
        $posts = Post::orderBy('id', 'desc')->paginate(10);

        // redirect to Index page with all Posts
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // get all Categories
        $categories = Category::all();

        return view('posts.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate data
        $this->validate($request, [
                'title'         => 'required|max:255',
                'slug'          => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
                'category_id'   => 'required|integer',
                'body'          => 'required'
            ]);

        //store in database
        $post = new Post;

        $post->title        = $request->title;
        $post->slug         = $request->slug;
        $post->category_id  = $request->category_id;
        $post->body         = $request->body;

        $post->save();

        //set flash data with success message
        Session::flash('success', 'The post was successfully saved');

        //redirect to another page
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // get Post by id
        $post = Post::find($id);

        // redirect to Show page with Post
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // get Post by id
        $post = Post::find($id);

        // get all Categories
        $categories = Category::all();
        $cats = array();
        foreach ($categories as $category) {
            $cats[$category->id] = $category->name;
        }

        // redirect to Edit page with Post
        return view('posts.edit')->with('post', $post)->with('categories', $cats);
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
        $post = Post::find($id);

        //validate data
        if ($request->input('slug') == $post->slug) {
            $this->validate($request, [
                'title'         => 'required|max:255',
                'category_id'   => 'required|integer',
                'body'          => 'required'
            ]);
        } else {
            $this->validate($request, [
                'title'         => 'required|max:255',
                'slug'          => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
                'category_id'   => 'required|integer',
                'body'          => 'required'
            ]);
        }
        
        //update in database
        $post->title        = $request->input('title');
        $post->slug         = $request->input('slug');
        $post->category_id  = $request->category_id;
        $post->body         = $request->input('body');

        $post->save();

        //set flash data with success message
        Session::flash('success', 'The post was successfully updated');

        //redirect to another page
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // get Post by id
        $post = Post::find($id);

        // delete Post from DB
        $post->delete();

        //set flash data with success message
        Session::flash('success', 'The post ' . $id . ' was successfully deleted');

        // redirect to Welcome page
        return redirect()->route('posts.index');
    }
    
}
