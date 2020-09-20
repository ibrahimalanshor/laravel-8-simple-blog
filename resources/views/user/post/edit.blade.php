@extends('__layouts.user')

@section('title', 'Edit Post')

@section('content')

<form action="{{ route('user.post.update', $post->id) }}" method="post">
<div class="row">
	<div class="col-8">
		<div class="card bg-white border-0 shadow-sm">
		    <div class="card-body">
		        <h3>Edit Post</h3>
		        <hr>
        		@method('put')
        		@csrf
        		<div class="form-group">
        			<label>Title</label>
        			<input type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Title" value="{{ $post->title }}" required>

        			@error('title')
        				<span class="invalid-feedback">{{ $message }}</span>
        			@enderror
        		</div>
        		<div class="form-group">
        			<label>Content</label>
  					<textarea name="content" class="form-control @error('content') is-invalid @enderror" placeholder="Content" required>{{ $post->content }}</textarea>

        			@error('content')
        				<span class="invalid-feedback">{{ $message }}</span>
        			@enderror
        		</div>
        		<button class="btn btn-primary" type="submit">Edit</button>
        		<a class="btn btn-danger" href="{{ route('user.post.index') }}">Cancel</a>
		    </div>
		</div>
	</div>
	<div class="col">
		<div class="card bg-white border-0 shadow-sm">
			<div class="card-body">
				<h3>Data</h3>
				<hr>
        		<div class="form-group">
        			<label>Slug</label>
        			<input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" placeholder="Slug" value="{{ $post->slug }}">

        			@error('slug')
        				<span class="invalid-feedback">{{ $message }}</span>
        			@enderror
        		</div>
                <div class="form-group">
                    <label>Category</label>
                    <select name="category[]" class="form-control custom-select" multiple>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ in_array($category->id, $categoryPost) ? 'selected=selected' : '' }} >{{ $category->name }}</option>
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
    </script>
    </script>
@endsection