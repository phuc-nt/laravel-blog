<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Post;
use Session;

class PostController extends Controller
{
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
        return view('posts.create');
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
                'title' => 'required|max:255',
                'slug'  => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
                'body'  => 'required'
            ]);

        //store in database
        $post = new Post;

        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->body = $request->body;

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

        // redirect to Edit page with Post
        return view('posts.edit')->with('post', $post);
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
                'title' => 'required|max:255',
                'body' => 'required'
            ]);
        } else {
            $this->validate($request, [
                'title' => 'required|max:255',
                'slug'  => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
                'body' => 'required'
            ]);
        }
        
        //update in database
        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->body = $request->input('body');

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
