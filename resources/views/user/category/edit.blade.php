@extends('__layouts.user')

@section('title', 'Edit Category')

@section('content')

<div class="col-md-5 mx-auto">
    <div class="card bg-white border-0 shadow-sm">
        <div class="card-body">
            <h3>Edit Category</h3>
            <hr>
            <form action="{{ route('user.category.update', $category->id) }}" method="post">
        		@csrf
                @method('put')
        		<div class="form-group">
        			<label>Name</label>
        			<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Name" value="{{ $category->name }}" required>

        			@error('name')
        				<span class="invalid-feedback">{{ $message }}</span>
        			@enderror
        		</div>
                <div class="form-group">
                    <label>Slug</label>
                    <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" placeholder="Slug" value="{{ $category->slug }}">

                    @error('slug')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
        		<button class="btn btn-primary" type="submit">Edit</button>
        		<a class="btn btn-danger" href="{{ route('user.category.index') }}">Cancel</a>
            </form>
        </div>
    </div>
</div>

@endsection