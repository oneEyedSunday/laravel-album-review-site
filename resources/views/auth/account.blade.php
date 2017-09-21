@extends('layouts.app')

@section('title', '| Account')

@section('content')

	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<img src="{{ route('filefetch', ['filename' => $user->avatar, 'admin' => 1]) }}" alt="User Profile image">
			<h2>Profile</h2>
			<form action="{{ route('account.update') }}" enctype="multipart/form-data" method="POST">
				{{ csrf_field() }}
				<label for="avatar">Update your profile image</label>
				<input type="file" name="avatar" accept="image/*">
				<input type="submit" class="pull-right btn btn-sm btn-primary">
			</form>
		</div>
	</div>

@endsection