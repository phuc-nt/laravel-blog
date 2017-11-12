<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Tag;
use Session;

class TagController extends Controller
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
        // get all Categories
        $tags = Tag::orderBy('id', 'desc')->paginate(10);

        // redirect to Index page with all PoCategoriessts
        return view('tags.index')->with('tags', $tags);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
                'name' => 'required|max:255'
            ]);

        //store in database
        $tag = new Tag;
        $tag->name = $request->name;
        $tag->save();

        //set flash data with success message
        Session::flash('success', 'New Tag was successfully saved');

        //redirect to another page
        return redirect()->route('tags.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // get Tag by id
        $tag = Tag::find($id);

        // delete Tag from DB
        $tag->delete();

        //set flash data with success message
        Session::flash('success', 'The Tag ' . $id . ' was successfully deleted');

        // redirect to Welcome page
        return redirect()->route('tags.index');
    }
}
