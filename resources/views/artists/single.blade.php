@extends('layouts.app')

@section('content')

	<div class="container">
		<div class="row ">
			<div class="col-lg-8 col-lg-offset-2">
				<h3 class="h1">{{$artist->name}}</h3>
				<p>List albums</p>
				@forelse($artist->albums as $album)
					<p><a href="{{route('albums.single', [$album->id])}}">{{$album->title}}</a></p>
				@empty
					<p><i>Sorry no album for {{$artist->name}} yet.</i></p>
					<a href="{{route('albums.create', [$artist->id])}}" class="btn btn-primary">Add here</a>
				@endforelse
			</div>
		</div>
	</div>

@endsection