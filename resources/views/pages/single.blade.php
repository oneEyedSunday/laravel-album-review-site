@extends('layouts.app')


@section('content')

	<div class="row">
		<div class="col-md-9 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2>{{$review->title}}</h2>
				</div>
				<div class="panel-body">
						<div class="row">
							<div class="col-md-7">
							<img src="{{route('filefetch', [$review->album->cover])}}" alt="{{$review->album->name}}'s cover art">
							</div>
							<div class="col-md-5 public_text">
								<p>{{$review->body}}</p>
							</div>
						</div>	
				</div>
			</div>
		</div>
	</div>

@endsection