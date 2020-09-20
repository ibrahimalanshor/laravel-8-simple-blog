@extends('__layouts.user')

@section('title', 'Dashboard')

@section('content')

<div class="card bg-white border-0 shadow-sm">
    <div class="card-body">
        <h3>Welcome Back {{ Auth::user()->name }}</h3>
        <hr>
        <div class="row">
        	<div class="col-3">
        		<a href="{{ route('user.post.index') }}" class="bg-white d-block text-dark shadow-sm">
        			<div class="bg-primary text-white rounded-top shadow-sm d-flex align-items-center justify-content-center" style="height: 150px; font-size: 40px">
        				<i class="icon ion-ios-list-box"></i>
    			 	</div>
    			 	<div class="p-4">
    			 		{{ count(Auth::user()->post) }} Post
    			 	</div>
        		</a>
        	</div>
        	<div class="col-3">
        		<a href="{{ route('user.category.index') }}" class="bg-white d-block text-dark shadow-sm">
        			<div class="bg-danger text-white rounded-top shadow-sm d-flex align-items-center justify-content-center" style="height: 150px; font-size: 40px">
        				<i class="icon ion-ios-albums"></i>
    			 	</div>
    			 	<div class="p-4">
    			 		{{ total('categories') }} Category
    			 	</div>
        		</a>
        	</div>
        	<div class="col-3">
        		<a href="{{ route('user.comment.index') }}" class="bg-white d-block text-dark shadow-sm">
        			<div class="bg-success text-white rounded-top shadow-sm d-flex align-items-center justify-content-center" style="height: 150px; font-size: 40px">
        				<i class="icon ion-ios-chatboxes"></i>
    			 	</div>
    			 	<div class="p-4">
    			 		{{ count(Auth::user()->comment) }} Comment
    			 	</div>
        		</a>
        	</div>
        	<div class="col-3">
        		<a href="{{ route('user.media.index') }}" class="bg-white d-block text-dark shadow-sm">
        			<div class="bg-primary text-white rounded-top shadow-sm d-flex align-items-center justify-content-center" style="height: 150px; font-size: 40px">
        				<i class="icon ion-ios-folder"></i>
    			 	</div>
    			 	<div class="p-4">
    			 		{{ count(Auth::user()->file) }} File
    			 	</div>
        		</a>
        	</div>
        </div>
    </div>
</div>

@endsection