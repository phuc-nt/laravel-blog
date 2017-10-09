<?php

namespace App\Http\Controllers;

/**
* Controller for all static pages
*/
class PagesController extends Controller
{
	public function getIndex()
	{
		$first = 'PHUC';
		$last = 'Nguyen Trong';

		$fullname = $first . " " . $last;
		$email = 'phucnt0@gmail.com';

		$data = [];
		$data['fullname'] = $fullname;
		$data['email'] = $email;

		return view('pages.welcome')->withData($data);
	}

	public function getAbout()
	{
		return view('pages.about');
	}

	public function getContact()
	{
		return view('pages.contact');
	}

}