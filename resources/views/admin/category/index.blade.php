@extends('__layouts.admin')

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
                                <form action="{{ route('admin.category.destroy', $category->id) }}" method="post" class="d-inline">
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
                </tbody>
        	</table>
            {{ $categories->links() }}
        </div>
    </div>
</div>

@endsection