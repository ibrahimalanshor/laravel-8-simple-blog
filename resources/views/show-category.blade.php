@extends('__layouts.app')

@section('title', $category->name)

@section('content')

	<h1>Post Under {{ $category->name }}</h1>

	<div class="row">
		@forelse($posts as $post)
			<div class="col-lg-3 col-md-4 py-4">
				<div class="card bg-white border-0 shadow-sm h-100">
					<img src="{{ $post->img() }}" alt="" class="card-img-top" style="height: 150px; object-fit: cover;">
					<div class="card-body">
						<h5><a class="text-dark" href="{{ route('post', $post->slug) }}">{{ $post->title }}</a></h5>
						<time class="text-muted d-block mb-2">{{ localDate($post->created_at) }}</time>
						<p class="text-justify">
							{{ $post->excerpt() }}
						</p>
					</div>
				</div>
			</div>
		@empty
			<div class="col mt-3">
				<h3 class="text-muted">No Post</h3>
			</div>
		@endforelse
	</div>
	{{ $posts->links() }}

@endsection