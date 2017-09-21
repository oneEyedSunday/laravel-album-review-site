@extends('main')

@section('title', 'Create Album')


@section('content')
	
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Create New Album</div>
					<div class="panel-body">
						@include('includes.flash')
						<form action="{{route('albums.store')}}" enctype="multipart/form-data" class="form-horizontal" role="form" method="POST">
							{!! csrf_field() !!}
							<div class="form-group {{$errors->has('title') ? 'has-error' : ''}}">
								<label for="title" class="col-md-4 control-label">Album Title</label>
								<div class="col-md-6">
								<input type="text" class="form-control" 
								id="title" name="title" value="{{old('title')}}" required>
								@if($errors->has('title'))
									<span class="help-block"><strong>{{$errors->first('title')}}</strong></span>
								@endif
								</div>
							</div>


							<div class="form-group {{$errors->has('artist') ? 'has-error' : ''}}">
								<label for="artist" class="col-md-4 control-label">Artist</label>
								<div class="col-md-6">
								<select name="artist" id="artist" class="form-control" required>
									@if($fill)
											<option value="{{$fill->id}}">{{$fill->name}}</option>
									@else
										<option value="">Select Artist</option>
										@foreach($artists as $artist)
											<option value="{{$artist->id}}">{{$artist->name}}</option>
										@endforeach
									@endif
								</select>

								@if($errors->has('artist'))
									<span class="help-block"><strong>{{$errors->first('artist')}}</strong></span>
								@endif
								</div>
							</div>

							<div class="form-group {{$errors->has('year') ? 'has-error' : ''}}">
								<label for="year" class="col-md-4 control-label">Release Year</label>
								<div class="col-md-6">
								<input type="date" class="form-control" id="year" name="year" value="{{old('year')}}">
								@if($errors->has('year'))
									<span class="help-block"><strong>{{$errors->first('year')}}</strong></span>
								@endif
								</div>
							</div>

							<div class="form-group {{$errors->has('art') ? 'has-error' : ''}}">
								<label for="art" class="col-md-4 control-label ">Album Art</label>
								<div class="col-md-6">
								<input type="file" class="form-control" accept="image/*" id="art" name="art" value="{{old('art')}}">
								@if($errors->has('art'))
									<span class="help-block"><strong>{{$errors->first('art')}}</strong></span>
								@endif
								</div>
							</div>

							<div class="form-group">
								<div class="col-md-6 col-md-offset-4"><button type="submit" class="btn btn-primary"><i class="fa fa-check fa-lg">Create Album</i></button>
								@if(!$fill)
								<a href="{{route('artists.create')}}" class="btn btn-success">Add the artist</a>
								@endif
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection