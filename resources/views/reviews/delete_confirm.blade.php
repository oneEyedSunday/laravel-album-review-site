@extends('main')

@section('title', '| Confirm Delete')

@section('stylesheets')
	<style>
		strong{
			color: #45af56;
		}
	</style>
@endsection

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="well">
					<h4 class="darken-text">You sure you want to delete <strong>{{$review->title}}</strong></h4>
					<div class="col-md-3">
								{!! Form::open(['route' => ['reviews.delete', $review->id], 'method' => 'DELETE']) !!}

								{!! Form::submit('Yes - Delete', ['class' => 'btn btn-danger btn-block']) !!}

								{!! Form::close() !!}
					</div>
					<div class="col-md-3">
						<a href="{{route('reviews.index')}}" class="btn btn-success btn-block">No - Back</a>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection