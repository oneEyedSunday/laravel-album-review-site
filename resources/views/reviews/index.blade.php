@extends('layouts.app')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2">
				<p class="lead">
					The following reviews are available
				</p>

				@foreach($reviews as $review)
					<p><a href="{{route('reviews.single', [$review->id])}}">{{$review->title}}</a></p>
				@endforeach

			</div>
		</div>
	</div>

@endsection