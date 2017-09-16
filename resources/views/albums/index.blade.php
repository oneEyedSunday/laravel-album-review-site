@extends('layouts.app')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2">
				<p class="lead">
					The following albums are available
				</p>

				@foreach($albums as $album)
					<p><a href="{{route('albums.single', [$album->id])}}">{{$album->title}}</a></p>
				@endforeach

				<div class="row">
					<div class="col-md-4 col-md-offset-2">
						<a href="{{route('albums.create')}}" class="btn btn-block btn-primary">Add an album</a>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection