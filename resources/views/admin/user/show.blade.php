@extends('__layouts.admin')

@section('title', 'Profile '.$user->name)

@section('content')

<div class="row">
	<div class="col-4">
		<div class="card bg-white border-0 shadow-sm">
			<div class="card-body text-center">
                <img src="{{ img($user->profile->photo ? $user->profile->photo : 'default.jpg') }}" class="img-fluid">
			</div>
		</div>
	</div>
	<div class="col-8">
		<div class="card bg-white border-0 shadow-sm">
		    <div class="card-body">
		        <h3>{{ $user->name }}</h3>
		        <hr>
                <table class="table table-bordered">
                    <tr>
                        <th>Name</th>
                        <td>{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <th>Gender</th>
                        <td>{{ $user->profile->gender ? $user->profile->gender : 'No Data' }}</td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td>{{ $user->profile->address ? $user->profile->address : 'No Data' }}</td>
                    </tr>
                    <tr>
                        <th>Birthday</th>
                        <td>{{ $user->profile->birthday ? $user->profile->birthday : 'No Data' }}</td>
                    </tr>
                    <tr>
                        <th>Bio</th>
                        <td>{{ $user->profile->bio ? $user->profile->bio : 'No Data' }}</td>
                    </tr>
                    <tr>
                </table>
            </div>
        </div>
	</div>
</div>

@endsection