@extends('__layouts.admin')

@section('title', 'All Media')

@section('content')

<div class="card bg-white border-0 shadow-sm">
    <div class="card-body">
        <h3>All Media</h3>
        <hr>
    	@if(session('success'))
	    	<div class="alert alert-success alert-dismissible">
	    		{{ session('success') }}
	    		<button class="close" data-dismiss="alert">&times;</button>
	    	</div>
	    @endif
        <div class="row">
            @forelse($files as $file)
                <div class="col-3 py-3">
                    <div class="card h-100">
                        <img src="{{ img($file->file) }}" style="height: 150px; object-fit: cover;" class="card-img-top border-bottom">
                        <div class="card-body">
                            {{ $file->file }}
                        </div>
                        <div class="card-footer">
                            <a href="{{ img('$file->file') }}" class="btn btn-sm btn-primary">Show</a>
                            <form class="d-inline" action="{{ route('admin.media.destroy', $file->id) }}" method="post">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger">Delete</submit>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col">
                    <h3 class="text-muted">No File</h3>
                </div>
            @endforelse
        </div>
        {{ $files->links() }}
    </div>
</div>

@endsection