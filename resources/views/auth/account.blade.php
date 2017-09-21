@extends('main')

@section('title', '| Account')

@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
{{-- 
			Debugging ssl issue with guzzlehttp
			{!! var_dump(openssl_get_cert_locations()) !!}
			 --}}
			 <div class="col-md-8 col-md-offset-3">
			 				<img src="{{ route('filefetch', ['filename' => $user->avatar, 'admin' => 1]) }}" alt="User Profile image">
			 </div>

			<h2>Profile</h2>
			<form action="{{ route('account.update') }}" enctype="multipart/form-data" method="POST" class="form-group">
				{{ csrf_field() }}
				<label for="name">Update your dipaly name</label>
				<input type="text" name="name" value="{{ $user->name}}" class="form-control">
				<label for="avatar">Update your profile image</label>
				<input type="file" name="avatar" accept="image/*" class="form-control">
				<input type="submit" class="btn btn-sm btn-primary spacing-top">
			</form>
		</div>
	</div>

@endsection