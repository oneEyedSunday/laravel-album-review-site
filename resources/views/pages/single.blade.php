@extends('main')


@section('content')

	<div class="row">
		<div class="col-md-9 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2>{{$review->title}} <span class="text-muted pull-right">by <img src="{{ route('filefetch', ['filename' => $review->author->avatar, 'admin' => 1]) }}" alt="{{$review->author->name}} avatar" class="author_avatar"> {{$review->author->name}}</span></h2>
				</div>
				<div class="panel-body">
						<div class="row">
							<div class="col-md-7">
							<img src="{{route('filefetch', [$review->album->cover])}}" alt="{{$review->album->name}}'s cover art" class="display_review_img">
							</div>
							<div class="col-md-5 public_text">
								<h4>{{$review->album->title}}</h4>
								<p>{{$review->body}}</p>
							</div>
						</div>	
				</div>

				<div class="panel-footer">
					<h4 class="panel_footer_text">More reviews of <strong>{{$review->album->artist->name}}</strong> click <a href="{{route('reviews.more', [$review->album->artist->id])}}" class="btn btn-more">here</a></h4>
				</div>
			</div>
		</div>
	</div>

@endsection