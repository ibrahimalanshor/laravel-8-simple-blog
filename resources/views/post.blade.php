@extends('__layouts.app')

@section('title', $post->title)

@section('content')

	<div class="row">
		<div class="col-lg-8">
			<div class="card bg-white border-0 shadow-sm">
				<div class="card-body post">
					<h1>{{ $post->title }}</h1>
					<time class="text-muted">{{ localDate($post->created_at) }} - <span>By {{ $post->user->name }}</span></time>
					<div class="my-2">
						@forelse($post->category as $category)
							<a href="{{ route('category.show', $category->slug) }}"><span class="badge badge-primary">{{ $category->name }}</span></a>
						@empty
							<span class="badge badge-primary">Uncategories</span>
						@endforelse
					</div>
					<hr>
					{!! $post->content !!}
				</div>
			</div>

			<div class="card bg-white border-0 shadow-sm mt-4">
				<div class="card-body">
					<h2>Comments</h2>
					<hr>
					@if(session('success'))
						<div class="alert alert-success alert-dismissble">
							{{ session('success') }}
							<button class="close" data-dismiss="alert">&times;</button>
						</div>
					@endif
					<ul class="list-unstyled mt-4">
						@forelse($comments as $comment)
							<li class="media mb-4 pb-3 border-bottom">
								<img src="{{ img('avatar.png') }}" class="img-fluid mr-3" style="width: 64px; height: 64px; object-fit: cover;">
								<div class="media-body">
									<h5 class="mt-0 mb-1">{{ $comment->name }}</h5>
									<small class="text-muted">{{ localDate($comment->created_at) }}</small>
									<p>
										{{ $comment->comment }}
									</p>
								</div>
							</li>
						@empty
							No Comment
						@endforelse
						{{ $comments->links() }}
					</ul>
				</div>
			</div>

			<div class="card bg-white border-0 shadow-sm mt-4">
				<div class="card-body">
					<h3>New Comment</h3>
					<form action="{{ route('comment') }}" method="post">
						@csrf
						<input type="hidden" name="post_id" value="{{ $post->id }}">
						<div class="form-group">
							<label>Name</label>
							<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Name" required>

							@error('name')
								<span class="invalid-feedback">{{ $message }}</span>
							@enderror
						</div>
						<div class="form-group">
							<label>Comment</label>
							<textarea name="comment" class="form-control @error('name') is-invalid @enderror" placeholder="Comment" required></textarea>

							@error('comment')
								<span class="invalid-feedback">{{ $message }}</span>
							@enderror
						</div>
						<button class="btn btn-primary">Submit</button>
					</form>
				</div>
			</div>
		</div>

		<div class="col-lg-4 mt-4 mt-lg-0">
			<div class="card shadow-sm border-0">
				<div class="card-body">
					<h3>Category</h3>
					<hr>
					<ul class="list-unstyled">
						@forelse($categories as $category)
				 			<li class="border-bottom py-2"><a href="{{ route('category.show', $category->slug) }}">{{ $category->name }}({{ count($category->post) }})</a></li>
				 		@empty
				 			<li>No Category</li>
				 		@endforelse
					</ul>
				</div>
			</div>
		</div>

	</div>

@endsection

@section('style')

<style>
	.post img{
		max-width: 100%;
	}
</style>