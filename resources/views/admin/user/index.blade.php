@extends('__layouts.admin')

@section('title', 'All User')

@section('content')

<div class="card bg-white border-0 shadow-sm">
    <div class="card-body">
        <h3>All User</h3>
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
                        <th>Email</th>
                        <th>Date Register</th>
        				<th>Actions</th>
        			</tr>
        		</thead>
                <tbody>
        			@forelse($users as $user)
        				<tr>
        					<td>{{ $loop->iteration }}</td>
        					<td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ localDate($user->created_at) }}</td>
        					<td>
        						<form class="d-inline" action="{{ route('admin.user.destroy', $user->id) }}" method="post">
        							@csrf
        							@method('delete')
        							<button class="btn btn-danger btn-sm" onclick="return confirm('Delete')" type="submit">Delete</button>
        						</form>
                                <a href="{{ route('admin.user.show', $user->id) }}" class="btn btn-sm btn-primary">Show</a>
        					</td>
        				</tr>
        			@empty
        				<tr>
        					<td colspan="5" align="center">Empty</td>
        				</tr>
        			@endforelse
                </tbody>
        	</table>
            {{ $users->links() }}
        </div>
    </div>
</div>

@endsection