@extends('layouts.app')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2">
				<p class="lead">
					The following artists are available
				</p>

				@foreach($artists as $artist)
					<p><a href="{{route('artists.single', [$artist->id])}}">{{$artist->name}}</a></p>
				@endforeach

				<div class="row">
					<div class="col-md-4 col-md-offset-2">
						<a href="{{route('artists.create')}}" class="btn btn-block btn-primary">Add an artist</a>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection