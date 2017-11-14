<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Category;
use Session;

class CategoryController extends Controller
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
        $categories = Category::orderBy('id', 'desc')->paginate(10);

        // redirect to Index page with all PoCategoriessts
        return view('categories.index')->with('categories', $categories);
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
        $category = new Category;
        $category->name = $request->name;
        $category->save();

        //set flash data with success message
        Session::flash('success', 'New Category was successfully saved');

        //redirect to another page
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Get Category by ID
        $category = Category::find($id);

        // Return to show view with Category
        return view('categories.show')->with('category', $category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // get Category by id
        $category = Category::find($id);

        // redirect to Edit page with Category
        return view('categories.edit')->with('category', $category);
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
        //validate data
        $this->validate($request, [
                'name' => 'required|max:255'
            ]);

        // get Category by id
        $category = Category::find($id);

        //store in database
        $category->name = $request->name;
        $category->save();

        //set flash data with success message
        Session::flash('success', 'Category '.$id.' was successfully updated');

        //redirect to another page
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // get Category by id
        $category = Category::find($id);

        // delete Category from DB
        $category->delete();

        //set flash data with success message
        Session::flash('success', 'The Category ' . $id . ' was successfully deleted');

        // redirect to Welcome page
        return redirect()->route('categories.index');
    }
}
