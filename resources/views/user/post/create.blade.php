@extends('__layouts.user')

@section('title', 'Create New Post')

@section('content')

<form action="{{ route('user.post.store') }}" method="post">
<div class="row">
	<div class="col-8">
		<div class="card bg-white border-0 shadow-sm">
		    <div class="card-body">
		        <h3>Create New Post</h3>
		        <hr>
        		@csrf
        		<div class="form-group">
        			<label>Title</label>
        			<input type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Title" value="{{ old('title') }}" required>

        			@error('title')
        				<span class="invalid-feedback">{{ $message }}</span>
        			@enderror
        		</div>
        		<div class="form-group">
        			<label>Content</label>
  					<textarea name="content" class="form-control @error('content') is-invalid @enderror" placeholder="Content" required>{{ isset($file) ? '<img src="{{ img($file) }}>' : old('content') }}</textarea>

        			@error('content')
        				<span class="invalid-feedback">{{ $message }}</span>
        			@enderror
        		</div>
        		<button class="btn btn-primary" type="submit">Create</button>
        		<a class="btn btn-danger" href="{{ route('user.post.index') }}">Cancel</a>
		    </div>
		</div>
	</div>
	<div class="col-4">
		<div class="card bg-white border-0 shadow-sm">
			<div class="card-body">
				<h3>Data</h3>
				<hr>
        		<div class="form-group">
        			<label>Slug</label>
        			<input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" placeholder="Slug" value="{{ old('slug') }}">

        			@error('slug')
        				<span class="invalid-feedback">{{ $message }}</span>
        			@enderror
        		</div>
                <div class="form-group">
                    <label>Category</label>
                    <select name="category[]" class="form-control custom-select" multiple>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach  
                    </select>
                </div>
			</div>
		</div>
	</div>
</div>
</form>

@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('vendor/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/select2.css') }}">
@endsection

@section('script')
    <script src="{{ asset('vendor/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('vendor/ckeditor/ckeditor.js' )}}"></script>
    <script>
        CKEDITOR.replace('content', {
            filebrowserUploadUrl: '{{ route("user.media.save", ["_token" => csrf_token()]) }}',
            filebrowserUploadMethod: 'form'
        })
        $('select').select2({
            placeholder: 'Category'
        })
    </script>
@endsection