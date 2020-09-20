@extends('__layouts.admin')

@section('title', 'All Comment')

@section('content')

<div class="card bg-white border-0 shadow-sm">
    <div class="card-body">
        <h3>All Comment</h3>
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
                        <th>Post</th>
        				<th>Name</th>
                        <th>Comment</th>
                        <th>Date</th>
        				<th>Actions</th>
        			</tr>
        		</thead>
                <tbody>
                    @forelse($comments as $comment)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $comment->post->title }}</td>
                            <td>{{ $comment->name }}</td>
                            <td>{{ $comment->comment }}</td>
                            <td>{{ localDate($comment->created_at) }}</td>
                            <td>
                                <a href="{{ route('post', $comment->post->slug) }}" class="btn btn-sm btn-success">Show</a>
                                <form action="{{ route('admin.comment.destroy', $comment->id) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" align="center">Empty</td>
                        </tr>
                    @endforelse
                </tbody>
        	</table>
            {{ $comments->links() }}
        </div>
    </div>
</div>

@endsection