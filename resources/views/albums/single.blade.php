@extends('main')

@section('content')

	<div class="container">
		<div class="row ">
			<div class="col-lg-8 col-lg-offset-2">
				<h3 class="h1">{{$album->title}}</h3>
				<h4>{{$album->year}}</h4>
				<p>{{$album->artist->name}}</p>
				<img src="{{route('filefetch', [$album->cover])}}" alt="Album Art">
				<p class="text-muted spacing-top">
					Number of reviews on album : {{ $reviewCount}}
				</p>
				<p>
					@if($reviewCount)
					<h4>Previous reviews: </h4>
						@foreach($album->reviews as $arev)
							<a href="{{ route('reviews.single', [$arev->id]) }}" class="btn btn-success">{{$arev->title}}</a>
						@endforeach
						<hr>
						<a href="{{ route('reviews.create', [$album->id]) }}" class="btn btn-primary">Add Review</a>
					@else
						<a href="{{ route('reviews.create', [$album->id]) }}" class="btn btn-primary">Write Review</a>
					@endif
				</p>
			</div>
		</div>
	</div>

@endsection