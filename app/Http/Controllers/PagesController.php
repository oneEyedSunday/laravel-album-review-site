<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use Mail;
use Session;

class PagesController extends Controller
{
    //
    public function index(){
    	$reviews = Review::paginate(5);
    	return view('pages.index')->withReviews($reviews);
    }

    public function show(Review $review){
    	return view('pages.single')->withReview($review);
    }

    public function getContact(){
    	return view('pages.contact');
    }

    public function postContact(Request $request){
    	$this->validate($request, [
    		'email' => 'required|email',
    		'subject' => 'min:3',
    		'message' => 'required|min:10'
   		]);

    	$data = ['email' => $request->email, 'subject'=> $request->subject, 'bodyMessage'=> $request->message];

    	Mail::send('emails.contact', $data, function($message) use ($data){
    		$message->from($data['email']);
    		$message->to('idiakosesunday@gmail.com');
    		$message->subject($data['subject']);
    	});

    	Session::flash('success', 'Your email was sent!');

    	return redirect('/');
    }
}
