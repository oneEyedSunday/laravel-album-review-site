@extends('main')

@section('content')

	<div class="row">
		<div class="col-md-12 col-md-offset-3">
			<p class="lead">
				Welcome, {{ Auth::user()->name }}. This is your home page. Quick links to actions.
			</p>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 col-md-offset-2">
			<div class="col-md-3 card p-2">
				<div class="card-block">
					<h4 class="card-title text-center">Manage your album database here</h4>
					<div class="card-text">
					<a href="{{route('albums.index')}}" class="btn btn-primary btn-block">Manage Albums</a>
					</div>	
				</div>		
			</div>
			<div class="col-md-3 card p-2">
				<div class="card-block">
					<h4 class="card-title text-center">Manage your artist database here.</h4>
					<div class="card-text">
						<a href="{{ route('artists.index') }}" class="btn btn-primary btn-block">Manage Artists</a>
					</div>
				</div>
			</div>

			<div class="col-md-3 card p-2">
				<div class="card-block">
					<h4 class="card-title text-center">Manage your album reviews here.</h4>
					<div class="card-text">
						<a href="{{ route('reviews.index') }}" class="btn btn-primary btn-block">Manage Reviews</a>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection