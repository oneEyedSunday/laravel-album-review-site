@extends('layouts.app')


@section('content')

	<div class="container">
		<div class="row">
			<div class="col-lg">
				<div class="jumbotron">
					<p class="lead">
						Welcome to Hip Hop Headz
					</p>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus aspernatur pariatur quisquam, ex neque inventore consectetur aut laboriosam sint tempore esse praesentium amet maiores ullam quae officiis voluptatum ipsum id?
					</p>
				</div>
			</div>
		</div>
		
		@forelse($reviews as $review)
		<div class="row">
			<div class="col-md-6 col-md-offset-1">
				<img src="{{route('filefetch', [$review->album->cover])}}" alt="{{$review->album->title}} artwork" class="review_img">
			</div>
			<div class="col-lg-3 col-lg-offset-1">
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

		{{$reviews->links()}}
	</div>

@endsection