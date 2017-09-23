@extends('main')


@section('content')

		<div class="row">
			<div class="col-lg">
				<div class="jumbotron">
					<p class="lead">
						Welcome to Hip Hop Headz
					</p>
					<p>
						We review your favorite albums, give you the expert verdict - were they that good or nostalgia is blurring your senses. Join us and have more weapons in your armory the next time you go to the barbers' shop to argue if Illmatic was beter than Ready To Die.
					</p>
				</div>
			</div>
		</div>
		
		@forelse($reviews as $review)
		<div class="row pad-round">
			<div class="col-md-4">
				<img src="{{route('filefetch', [$review->album->cover])}}" alt="{{$review->album->title}} artwork" class="review_img">
			</div>
			<div class="col-md-8">
				<h3>{{$review->album->artist->name}}</h3>
				<h4>{{$review->album->title}}</h4>
				<p><strong>BY:</strong>  {{$review->author->name}}</p>
				<p>{{$review->title}}</p>
				<a href="{{route('public.review', [$review->id])}}" class="btn btn-primary">Read Review</a>
			</div>
		</div>
		@empty
			<div class="row">
				<div class="col">
					No reviews yet, please check back later.
				</div>
			</div>
		@endforelse
		<div class="text-center">
			{{$reviews->links()}}
		</div>
		

@endsection