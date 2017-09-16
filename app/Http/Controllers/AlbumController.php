<?php

namespace App\Http\Controllers;


use App\Album;
use App\Artist;
use Image;
use Illuminate\Http\Request;
use Storage;

class AlbumController extends Controller
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
        $albums = Album::all();
        return view('albums.index')->withAlbums($albums);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Artist $artist = null)
    {
        //
        $artists = Artist::all();
        return view('albums.create')->withArtists($artists)->withFill($artist);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($request);
         // dd((int)(substr($request->year, 0,4)));
        $this->validate($request, [
            'title' => 'required|max:255',
            'artist' => 'required|numeric',
            'year' => 'required',
            'art' => 'file'
        ]);


        $album = new Album;
        $album->title = $request->title;
        $album->artist_id = $request->artist;
        $album->year = (int)(substr($request->year, 0,4));

        if($request->hasFile('art')){
            $album_art = $request->file('art');
            $filename = $album->id . time() . '.' . $album_art->getClientOriginalExtension();
            Image::make($album_art)->resize(640,480)->save(storage_path('app/public/uploads/album_art/'.$filename));
            $album->cover = $filename;
        }

        $album->save();
        return redirect()->route('albums.single', [$album->id]);
        return redirect()->route('landing');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function show(Album $album)
    {
        //
        // $album_f = Album::find($album);
        // return view('albums.single')->withAlbum($album_f);
        return view('albums.single')->withAlbum($album);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function edit(Album $album)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Album $album)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy(Album $album)
    {
        //
    }
}
