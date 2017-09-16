<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;

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
}
