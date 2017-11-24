<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Post;
use App\Category;
use App\Tag;
use Session;
use Image;
use Storage;

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

        // get all Tags
        $tags = Tag::all();

        return view('posts.create')->with('categories', $categories)->with('tags', $tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);

        //validate data
        $this->validate($request, [
                'title'         => 'required|max:255',
                'slug'          => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
                'category_id'   => 'required|integer',
                'body'          => 'required',
                'featured_image' => 'sometimes|image'
            ]);

        //store in database
        $post = new Post;

        $post->title        = $request->title;
        $post->slug         = $request->slug;
        $post->category_id  = $request->category_id;
        $post->body         = $request->body;

        if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->save($location);

            $post->image = $filename;
        }

        $post->save();

        //save tags without overwrite
        if (isset($request->tags)) {
            $post->tags()->sync($request->tags, false);
        }

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

        // get all Tags
        $tags = Tag::all();
        $ts = array();
        foreach ($tags as $tag) {
            $ts[$tag->id] = $tag->name;
        }

        // redirect to Edit page with Post, Categories and Tags
        return view('posts.edit')->with('post', $post)->with('categories', $cats)->with('tags', $ts);
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
        $this->validate($request, [
            'title'         => 'required|max:255',
            'slug'          => "required|alpha_dash|min:5|max:255|unique:posts,slug,$id", // them $id de tranh double check
            'category_id'   => 'required|integer',
            'body'          => 'required',
            'featured_image' => 'image'
        ]);
        
        //update in database
        $post->title        = $request->input('title');
        $post->slug         = $request->input('slug');
        $post->category_id  = $request->category_id;
        $post->body         = $request->input('body');

        if ($request->hasFile('featured_image')) {
            // add new image
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->save($location);

            // update DB
            $oldFileName = $post->image;
            $post->image = $filename;

            // delete old image
            // check Storage config in config/filesystem.php
            Storage::delete($oldFileName);
        }

        $post->save();

        //overwrite old tags and save new tags
        if (isset($request->tags)) {
            $post->tags()->sync($request->tags, true);
        } else {
            $post->tags()->sync([], true);
        }

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

        // remove references Tags
        $post->tags()->detach();

        // delete Image
        Storage::delete($post->image);

        // delete Post from DB
        $post->delete();

        //set flash data with success message
        Session::flash('success', 'The Post ' . $id . ' was successfully deleted');

        // redirect to Welcome page
        return redirect()->route('posts.index');
    }
    
}
