@extends('main')

@section('title', '| Manage Reviews')

@section('stylesheets')

	<style>
		@media screen and (max-width: 631px) {
			.table td {
				word-wrap: break-word;
				white-space: normal;
			}

			.small-screen-hide {
				display: none;
			}
		}
		
	</style>

@endsection

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<p class="lead">
					The following reviews are available
				</p>
			<table class="table">
				<thead>
					<tr>
						<th>Title</th>
						<th class="small-screen-hide">Artist</th>
						<th>Album</th>
						<th>Author</th>
						<th class="small-screen-hide">Created At</th>
						<th class="small-screen-hide">Last updated</th>
						<th></th>
					</tr>
				</thead>

				<tbody>
					@foreach($reviews as $review)
						<tr>
							<td><a href="{{route('reviews.single', [$review->id])}}">{{ $review->title }}</a></td>
							<td class="small-screen-hide">{{ $review->album->artist->name }}</td>
							<td>{{ $review->album->title }}</td>
							<td>{{ $review->author->name}}</td>
							<td class="small-screen-hide">{{ $review->created_at }}</td>
							<td class="small-screen-hide">{{ $review->updated_at }}</td>
							<td><a href="{{route('reviews.confirm', [$review->id])}}" class="btn btn-danger">Delete</a></td>
						</tr>
					@endforeach
				</tbody>				
			</table>

			{!! $reviews->links() !!}

			</div>
		</div>
	</div>

@endsection