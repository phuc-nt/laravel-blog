<?php

namespace App\Http\Controllers;

use App\Post;
use DB;

/**
* Controller for all static pages
*/
class PagesController extends Controller
{
	public function getIndex()
	{
		// get top 4 new Posts
        $posts = DB::table('posts')->orderBy('created_at', 'desc')->limit(4)->get();
        //$posts = Post::orderBy('created_at', 'desc')->take(4)-> get();

        // redirect to Welcome page with top recently 4
		return view('pages.welcome')->with('posts', $posts);
	}

	public function getAbout()
	{
		$first = 'PHUC';
		$last = 'Nguyen Trong';

		$fullname = $first . " " . $last;
		$email = 'phucnt0@gmail.com';

		$data = [];
		$data['fullname'] = $fullname;
		$data['email'] = $email;

		return view('pages.about')->withData($data);
	}

	public function getContact()
	{
		return view('pages.contact');
	}

}