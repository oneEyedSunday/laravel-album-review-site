<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('search', 'SearchController@search')->name('reviews.search');

Route::get('allreviews/{artist}', 'SearchController@moreFromArtist')->name('reviews.more');

Route::get('admin', 'UserController@index')->name('admin.landing');

Auth::routes();

Route::get('contact','PagesController@getContact')->name('contact.show');
Route::post('contact', 'PagesController@postContact')->name('contact.post');
Route::get('{review}', 'PagesController@show')->name('public.review');
Route::get('/', 'PagesController@index')->name('landing');



Route::prefix('admin')->group(function(){
	
	Route::get('profile','UserController@getProfile')->name('account');
	Route::post('profile','UserController@postProfile')->name('account.update');
	Route::get('artists/create', 'ArtistController@create')->name('artists.create');
	Route::post('artists/create', 'ArtistController@store')->name('artists.store');
	Route::get('artists', 'ArtistController@index')->name('artists.index');
	Route::get('artists/{artist}', 'ArtistController@show')->name('artists.single');
});

Route::prefix('admin/albums')->group(function(){
	Route::get('create/{artist?}', 'AlbumController@create')->name('albums.create');
	Route::post('create', 'AlbumController@store')->name('albums.store');
	Route::get('', 'AlbumController@index')->name('albums.index');
	Route::get('{album}', 'AlbumController@show')->name('albums.single');
});

Route::get('/upload/{filename}/{admin?}', function($filename, $admin = 0){
	if ($admin){
		$path = storage_path('app/public/uploads/admin/' . $filename);
	}else {
		$path = storage_path('app/public/uploads/album_art/' . $filename);
	}
	
	$file = \File::get($path);
	$response = Response::make($file, 200);
	return $response;
})->name('filefetch');


Route::prefix('admin/reviews')->group(function(){
	Route::get('create/{album}', 'ReviewController@create')->name('reviews.create');
	Route::post('create', 'ReviewController@store')->name('reviews.store');
	Route::get('', 'ReviewController@index')->name('reviews.index');
	Route::get('{review}', 'ReviewController@show')->name('reviews.single');
	Route::get('edit/{review}', 'ReviewController@edit')->name('reviews.edit');
	Route::post('edit/{review}', 'ReviewController@update')->name('reviews.update');
	Route::get('delete/{review}', 'ReviewController@getDelete')->name('reviews.confirm');
	Route::delete('delete/{review}','ReviewController@destroy')->name('reviews.delete');
});
