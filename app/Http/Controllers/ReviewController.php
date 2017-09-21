<?php

namespace App\Http\Controllers;

use App\Review;
use App\Album;
use Illuminate\Http\Request;
use Auth;

class ReviewController extends Controller
{
    public function __construct(){
        return $this->middleware('auth');
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $reviews = Review::paginate(10);
        return view('reviews.index')->withReviews($reviews);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Album $album)
    {
        //
        return view('reviews.create')->withAlbum($album);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'album' => 'required|exists:albums,id',
            'body' => 'required|min:20'
        ]);

        $review = new Review;
        $review->title = $request->title;
        $review->body = $request->body;
        $review->album_id = $request->album;
        $review->author_id = Auth::user()->id;
        $review->save();
        return redirect()->route('reviews.single', [$review->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        //
        return view('reviews.single')->withReview($review);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        //
        return view('reviews.edit')->withReview($review);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        //
        //dd($review);
        $this->validate($request, [
            'title' => 'required|max:255',
            'album' => 'required|exists:albums,id',
            'body' => 'required|min:20'
        ]);

        $review->title = $request->title;
        $review->body = $request->body;
        $review->author_id = Auth::user()->id;
        $review->update();
        //dd($review);
        return redirect()->route('reviews.single', [$review->id]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        $title = $review->title; 
        $review->album()->detach();

        $review->author()->detach();

        $review->delete();

        Session::flash('success', 'The review, {$review->title} was successfully deleted.');
        return redirect()->route('reviews.index');
    }

    public function getDelete(Review $review){
        // dd($review);
        return view('reviews.delete_confirm')->withReview($review);
    }
}
