@extends('main')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2">
				<p class="lead">
					The following artists are available
				</p>
				<div class="grid-container no-color-mix">
				@foreach($artists as $artist)
					<div class="card-block">
						<div class="card-title">{{$artist->name}}</div>
						<div class="card-text">
							<a href="{{route('artists.single', [$artist->id])}}" class="btn btn-primary btn-block">View {{$artist->name}}</a>
						</div>
					</div>
				@endforeach
				</div>

				<div class="row">
					<div class="col-md-4 col-md-offset-2">
						<a href="{{route('artists.create')}}" class="btn btn-block btn-primary spacing-top">Add an artist</a>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection