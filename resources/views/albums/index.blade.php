@extends('main')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2">
				<p class="lead">
					The following albums are available
				</p>
				
				<div class="grid-container">
				@forelse($albums as $album)
					<div class="card">
						<div class="card-block">
							<div class="card-title">
								{{$album->title}}
							</div>
							<div class="card-text">
								<img src="{{route('filefetch', [$album->cover])}}" alt="Album cover" class="album-card-cover">
							</div>
							<div class="card-footer">
								<a href="{{route('albums.single', [$album->id])}}" class="btn btn-success spacing-top btn-block">View</a>
							</div>
						</div>
					</div>
					{{-- <div>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur eligendi tempore odit odio delectus! Obcaecati nihil quas itaque pariatur, consequuntur!
						<a href="{{route('albums.single', [$album->id])}}">{{$album->title}}</a>
					</div> --}}

				@empty
					<a href="{{ route('albums.create')}}">Create albums here.</a>
				@endforelse
				</div>

				<div class="row">
					<div class="col-md-4 col-md-offset-2">
						<a href="{{route('albums.create')}}" class="btn btn-block btn-primary spacing-top">Add an album</a>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection