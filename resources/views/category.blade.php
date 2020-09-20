@extends('__layouts.app')

@section('title', 'Category')

@section('content')

	<div class="card bg-white border-0 shadow-sm">
		<div class="card-body">
			<h1>All Categories</h1>
			<hr>
			<div class="row">
				@forelse($categories->chunk(10) as $col)
				<div class="col-lg-2 col-sm-3 col-6">
					<ul class="list-unstyled">
						@foreach($col as $category)
							<li><a href="{{ route('category.show', $category->slug) }}">{{ $category->name }} ({{ count($category->post) }})</a></li>
						@endforeach
					</ul>
				</div>
				@empty
					<div class="col">
						No Category
					</div>
				@endforelse
			</div>
		</div>
	</div>

@endsection