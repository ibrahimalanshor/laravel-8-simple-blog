@extends('__layouts.user')

@section('title', 'Upload File')

@section('content')

<div class="col-md-5 mx-auto">
    <div class="card bg-white border-0 shadow-sm">
        <div class="card-body">
            <h3>Upload File</h3>
            <hr>
            <form action="{{ route('user.media.store') }}" method="post" enctype="multipart/form-data">
        		@csrf
                <div class="form-group">
                    <label>File</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input @error('file') is-invalid @enderror" name="file" placeholder="File" value="{{ old('file') }}">
                        <label class="custom-file-label">Upload File</label>
                        @error('file')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                </div>
        		<button class="btn btn-primary" type="submit">Upload</button>
        		<a class="btn btn-danger" href="{{ route('user.media.index') }}">Cancel</a>
            </form>
        </div>
    </div>
</div>

@endsection

@section('script')
    <script src="{{ asset('vendor/bs-custom-file-input/dist/bs-custom-file-input.min.js' )}}"></script>
    <script>
        bsCustomFileInput.init()
    </script>
@endsection