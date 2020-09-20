@extends('__layouts.admin')

@section('title', 'All Post')

@section('content')

<div class="card bg-white border-0 shadow-sm">
    <div class="card-body">
        <h3>All Post</h3>
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
        				<th>Title</th>
                        <th>User</th>
                        <th>Date</th>
        				<th>Actions</th>
        			</tr>
        		</thead>
                <tbody>
        			@forelse($posts as $post)
        				<tr>
        					<td>{{ $loop->iteration }}</td>
        					<td>{{ $post->title }}</td>
                            <td>{{ $post->user->name }}</td>
                            <td>{{ localDate($post->created_at) }}</td>
        					<td>
        						<form class="d-inline" action="{{ route('admin.post.destroy', $post->id) }}" method="post">
        							@csrf
        							@method('delete')
        							<button class="btn btn-danger btn-sm" onclick="return confirm('Delete')" type="submit">Delete</button>
        						</form>
                                <a href="{{ route('post', $post->slug) }}" class="btn btn-sm btn-primary">Show</a>
        					</td>
        				</tr>
        			@empty
        				<tr>
        					<td colspan="5" align="center">Empty</td>
        				</tr>
        			@endforelse
                </tbody>
        	</table>
            {{ $posts->links() }}
        </div>
    </div>
</div>

@endsection