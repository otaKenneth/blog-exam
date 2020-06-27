@extends('layouts.app')

@section('content')
<div class="container">
	<form action="{{ url("/p/$post->id") }}" method="post">
		@csrf
		@method('delete')
		<div class="row justify-content-center">
			<div class="col-5">
				<img src="/storage/{{ $post->image }}" class="w-100">
			</div>
			<div class="col-4">
				<div class="d-flex align-items-center">
					<div class="pr-3">
						<img src="{{ $post->user->profile->profileImage() }}" class="rounded-circle" style="max-width: 50px;">
					</div>
					<div class="font-weight-bold">
						<a href="/profile/{{ $post->user->id }}" class="text-dark">
							{{ $post->user->username }}
						</a>
						{{-- <a href="" class="pl-3">Follow</a> --}}
					</div>
					<div class="w-100 text-right">
						<a class="btn btn-primary" href="{{ url("/p/$post->id/edit") }}">Edit</a>
						<button class="btn btn-danger">Delete</button>
					</div>
				</div>
				<hr>
				<div>
					<h4>{{ $post->title }}</h4>
					<p>{{ $post->description }}</p>
				</div>
			</div>
		</div>
	</form>
</div>
@endsection
