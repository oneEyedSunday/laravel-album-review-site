@extends('main')

@section('content')

	<div class="container">
		<div class="row ">
			<div class="col-lg-8 col-lg-offset-2">
				<h3 class="h1">{{$review->title}}</h3>
				<p>{{$review->body}}</p>
				<p>
					<a href="{{route('reviews.index')}}" class="btn btn-default">Back to list</a>
					<a href="{{route('reviews.edit', [$review->id])}}" class="btn btn-primary">Edit</a>
				</p>
			</div>
		</div>
	</div>

@endsection