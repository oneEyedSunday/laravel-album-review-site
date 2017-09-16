@extends('layouts.app')

@section('content')

	<div class="container">
		<div class="row ">
			<div class="col-lg-8 col-lg-offset-2">
				<h3 class="h1">{{$album->title}}</h3>
				<h4>{{$album->year}}</h4>
				<p>{{$album->artist->name}}</p>
				<img src="{{route('filefetch', [$album->cover])}}" alt="Album Art">
				<p><a href="{{route('reviews.create', [$album])}}" class="btn btn-primary">Write Review</a></p>
			</div>
		</div>
	</div>

@endsection