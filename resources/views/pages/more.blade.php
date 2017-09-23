@extends('main')

@section('title', '| More from Artist')

@section('content')

	<div class="container">
		<p class="h2">More from {{$artist}}</p>
		@forelse($results as $res)
			<div class="row">
				<div class="col-md-6 col-md-offset-2">
						<section class="list-group">
							<a href="{{route('public.review', [$res->id])}}" class="list-group-item list-group-item-action">{{$res->title}}</a>
						</section>
				</div>
			</div>
		@empty
			<div class="row">
				<div class="col-md-8 col-md-offset-2 col-xs-6 col-xs-offset-2">
					<p class="lead">Sorry, no reviews for this artist, try again</p>
				</div>
			</div>

		@endforelse
	</div>

@endsection