<?php 

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Album;
use App\Review;
use App\Artist;

class SearchController extends Controller {
	public function search(Request $request){

		$text = $request->search_text;  
        $albumSearchRes = $this->searchAlbum($text);
        $artistSearchRes = $this->searchArtist($text);
        $reviewSearchRes = $this->searchReview($text);
        
        // control for merge later on
        $resAlb = [];

        // control for merge later on
        $resArt = [];

        // control for merge later on
        $resRev = [];

        // need a list or array of all reviews linked to seach term


        // either from album
        if($albumSearchRes->isNotEmpty()){
	        // gets an array of all album ids related to a search term
	        $aa = [];
	        foreach ($albumSearchRes as $a) {
	        	$albs = $a->artist->albums;
	        	foreach ($albs as $album) {
	        		array_push($aa, $album->id);
	        	}
	        }

	        $resAlb = $this->getReviewsFromAlbumIds($aa);
    	}

    	// or from artist

    	if($artistSearchRes->isNotEmpty()) {
    		$aa = [];
    		foreach($artistSearchRes as $a) {
    			$arts = $a->albums;
    			foreach ($arts as $album) {
    				array_push($aa, $album->id);
    			}
    		}

    		$resArt = $this->getReviewsFromAlbumIds($aa);
    	}
        
        // from review itself
        if ($reviewSearchRes->isNotEmpty()){
        	$resRev = $reviewSearchRes;
        }
        // merge
        $resMerge =  array_merge(is_array($resArt) ? $resArt : $resArt->toArray(), is_array($resAlb) ? $resAlb : $resAlb->toArray(), is_array($resRev) ? $resRev : $resRev->toArray());
        return view('pages.searchresults')->withResults($resMerge)->withQuery($text);
    }

    public function moreFromArtist(Artist $artist){
    	$albums = $artist->albums;
    	$reviews = [];
    	foreach ($artist->albums as $album) {
    		array_push($reviews, $album->reviews()->select("title", "id")->get());
    	}

    	return view('pages.more')->withResults($reviews[0])->withArtist($artist->name);

    	// $res =  $artist->albums->reviews()->select("id", "title")->get()->toArray();
    	// return view('pages.more')->withResults($res);
    }

    private function searchAlbum($text){
    	$result = Album::where('title', 'like', "%{$text}%")->get();
    	return $result;
    }

    private function searchArtist($text){
    	$result = Artist::where('name', 'like', "%{$text}%")->get();
    	return $result;
    }

    private function searchReview($text){
    	$result = Review::where('title', 'like', "%{$text}%")->select('id', 'title')->get();
    	return $result;
    }

    private function getReviewsFromAlbumIds($idArray){
    	$reviews = [];

    	foreach ($idArray as $id) {
    		$test = Review::where('album_id', '=', $id)->select('id', 'title');
    		if($test->get()->isEmpty()){

    		}else{
    			array_push($reviews, $test->get());
    		}		
    	}
    	if($reviews === []){
    		return $reviews;
    	}else {
    		return $reviews[0];
    	}
    }

}


?>