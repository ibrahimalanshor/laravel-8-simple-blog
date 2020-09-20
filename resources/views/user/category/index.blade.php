@extends('__layouts.user')

@section('title', 'All Category')

@section('content')

<div class="card bg-white border-0 shadow-sm">
    <div class="card-body">
        <h3>All Category</h3>
        <hr>
    	@if(session('success'))
	    	<div class="alert alert-success alert-dismissible">
	    		{{ session('success') }}
	    		<button class="close" data-dismiss="alert">&times;</button>
	    	</div>
	    @endif
        <a href="{{ route('user.category.create') }}" class="btn btn-primary mb-3">Create New Category</a>
        <div class="table">
        	<table class="table table-bordered">
        		<thead>
        			<tr>
        				<th>No</th>
        				<th>Name</th>
        				<th>Actions</th>
        			</tr>
        		</thead>
                <tbody>
                    @forelse($categories as $category)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $category->name }}</td>
                            <td>
                                <a href="{{ route('user.category.edit', $category->id) }}" class="btn btn-sm btn-success">Edit</a>
                                <form action="{{ route('user.category.destroy', $category->id) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" align="center">Empty</td>
                        </tr>
                    @endforelse
                    {{ $categories->links() }}
                </tbody>
        	</table>
        </div>
    </div>
</div>

@endsection