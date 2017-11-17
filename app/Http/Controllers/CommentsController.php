<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Comment;
use App\Post;
use Session;

class CommentsController extends Controller
{
    // Check authen, just logged in user can access
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'store']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $post_id)
    {
        //validate data
        $this->validate($request, [
                'name'      => 'required|max:255',
                'email'     => 'email|required|max:255|',
                'comment'   => 'required|min:10|max:2000'
            ]);

        //store in database
        $comment = new Comment;

        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->comment = $request->comment;
        $comment->approved = true;

        //add related Post ID to this comment
        $post = Post::find($post_id);
        $comment->post()->associate($post);

        $comment->save();

        //set flash data with success message
        Session::flash('success', 'Comment was Added');

        //redirect to another page
        return redirect()->route('blog.single', [$post->slug]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = Comment::find($id);
        return view('comments.edit')->with('comment', $comment);
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
        $comment = Comment::find($id);

        //validate data
        $this->validate($request, [
                'comment'   => 'required|min:10|max:2000'
            ]);

        $comment->comment = $request->comment;
        $comment->save();

        //set flash data with success message
        Session::flash('success', 'Comment was Updated');

        //redirect to another page
        return redirect()->route('posts.show', [$comment->post->id]);
    }

    public function delete($id)
    {
        $comment = Comment::find($id);
        return view('comments.delete')->with('comment', $comment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);
        $post_id = $comment->post->id;

        $comment->delete();

        //set flash data with success message
        Session::flash('success', 'Comment was Deleted');

        //redirect to another page
        return redirect()->route('posts.show', [$post_id]);
    }
}
