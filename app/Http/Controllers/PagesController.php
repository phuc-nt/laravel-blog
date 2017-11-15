<?php

namespace App\Http\Controllers;

use App\Post;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use Mail;
use Session;

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

	public function postContact(Request $request)
	{
		$this->validate($request, [
                'email' => 'required|email',
                'subject' => 'min:3',
                'message' => 'min:10'
            ]);

		$data = array(
			'email' => $request->email,
			'subject' => $request->subject,
			'bodyMessage' => $request->message
		);

		Mail::send('emails.contact', $data, function($message) use ($data){
			$message->from($data['email']);
			$message->to('phucnt.test1@gmail.com');
			$message->subject($data['subject']);
		});

		//set flash data with success message
        Session::flash('success', 'The Email was Sent!');

        //redirect to another page
        return redirect()->route('contact.get');
	}

}