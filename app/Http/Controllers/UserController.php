<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use Storage;
use Auth;

class UserController extends Controller
{
    //

    public function __construct(){
    	return $this->middleware('auth');
    }

    public function getProfile(){
		return view('auth.account')->withUser(Auth::user());
	}

	public function postProfile(Request $request){
		$this->validate($request, ['avatar' => 'file']);
		if($request->hasFile('avatar')){
    		$avatar = $request->file('avatar');
    		$filename = Auth::user()->id . time(). '.' . $avatar->getClientOriginalExtension();
    		Image::make($avatar)->resize(300,300)->save(storage_path('app/public/uploads/admin/'.$filename));
    		$user = Auth::user();
    		$user->avatar = $filename;
    		$user->save();
    	}

    	return view('auth.account')->withUser(Auth::user());
	}
}
