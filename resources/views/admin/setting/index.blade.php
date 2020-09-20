@extends('__layouts.admin')

@section('title', 'Update Site')

@section('content')

<div class="col-md-5 mx-auto">
    <div class="card bg-white border-0 shadow-sm">
        <div class="card-body">
            <h3>Update Site</h3>
            <hr>
            @if(session('success'))
                <div class="alert alert-success alert-dismissible">
                    {{ session('success') }}
                    <button class="close" data-dismiss="alert">&times;</button>
                </div>
            @endif
            <form action="{{ route('admin.setting.update') }}" method="post">
        		@csrf
                @method('put')
        		<div class="form-group">
        			<label>Name</label>
        			<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Name" value="{{ site('name') }}" required>

        			@error('name')
        				<span class="invalid-feedback">{{ $message }}</span>
        			@enderror
        		</div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Description" required>{{ site('description') }}</textarea>

                    @error('description')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
        		<button class="btn btn-primary" type="submit">Update</button>
            </form>
        </div>
    </div>
</div>

@endsection