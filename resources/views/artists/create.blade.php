@extends('layouts.app')

@section('title', 'Create Artist')


@section('content')
	
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Create New Artist</div>
					<div class="panel-body">
						@include('includes.flash')
						<form action="{{route('artists.store')}}" class="form-horizontal" role="form" method="POST">
							{!! csrf_field() !!}
							<div class="form-group {{$errors->has('name') ? 'hase-error' : ''}}">
								<label for="name" class="col-md-4 control-label">Artist Name</label>
								<div class="col-md-6">
								<input type="text" class="form-control" 
								id="name" name="name" value="{{old('name')}}">
								@if($errors->has('name'))
									<span class="help-block"><strong>{{$errors->first('name')}}</strong></span>
								@endif
								</div>
							</div>

							<div class="form-group">
								<div class="col-md-6 col-md-offset-4"><button type="submit" class="btn btn-primary"><i class="fa fa-btn">Create Artist</i></button></div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection