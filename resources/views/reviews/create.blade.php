@extends('layouts.app')

@section('title', 'Create Review')


@section('content')
	
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Create New Review</div>
					<div class="panel-body">
						@include('includes.flash')
						<form action="{{route('reviews.store')}}" class="form-horizontal" role="form" method="POST">
							{!! csrf_field() !!}
							<div class="form-group {{$errors->has('title') ? 'has-error' : ''}}">
								<label for="title" class="col-md-4 control-label">Review Title</label>
								<div class="col-md-6">
								<input type="text" class="form-control" 
								id="title" name="title" value="{{old('title')}}" required>
								@if($errors->has('title'))
									<span class="help-block"><strong>{{$errors->first('title')}}</strong></span>
								@endif
								</div>
							</div>


							<div class="form-group {{$errors->has('album') ? 'has-error' : ''}}">
								<label for="album" class="col-md-4 control-label">Album</label>
								<div class="col-md-6">
									<input type="text" readonly="true" value="{{$album->title}}" class="form-control">
									<input type="hidden" name="album" value="{{$album->id}}">
									@if($errors->has('album'))
									<span class="help-block"><strong>{{$errors->first('album')}}</strong></span>
								@endif
								</div>
							</div>

							<div class="form-group {{$errors->has('body') ? 'has-error' : ''}}">
								<label for="body" class="col-md-4 control-label">Review</label>
								<div class="col-md-6">
								<textarea name="body" id="body" cols="30" rows="10" class="form-control"></textarea>
								@if($errors->has('body'))
									<span class="help-block"><strong>{{$errors->first('body')}}</strong></span>
								@endif
								</div>
							</div>

							<div class="form-group">
								<div class="col-md-6 col-md-offset-4"><button type="submit" class="btn btn-primary">Post Review</button></div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection