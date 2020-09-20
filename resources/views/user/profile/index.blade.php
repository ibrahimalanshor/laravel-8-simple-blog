@extends('__layouts.user')

@section('title', 'Edit Profile')

@section('content')

<div class="row">
	<div class="col-4">
		<div class="card bg-white border-0 shadow-sm">
			<div class="card-body text-center">
                <img src="{{ img($profile->photo ? $profile->photo : 'default.jpg') }}" class="img-fluid">
			</div>
		</div>
	</div>
	<div class="col-8">
		<div class="card bg-white border-0 shadow-sm">
		    <div class="card-body">
		        <h3>Edit Profile</h3>
		        <hr>
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible">
                        {{ session('success') }}
                        <button class="close" data-dismiss="alert">&times;</button>
                    </div>
                @endif
                <form action="{{ route('user.profile.update') }}" method="post" enctype="multipart/form-data">
                    @method('put')
            		@csrf
                    <div class="form-row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Name" value="{{ Auth::user()->name }}" required>

                                @error('name')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Birthday</label>
                                <input type="date" class="form-control @error('birthday') is-invalid @enderror" name="birthday" placeholder="Birthday" value="{{ $profile->birthday }}" required>

                                @error('birthday')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="d-block">Gender</label>
                                <div class="custom-control custom-radio d-inline mr-2">
                                    <input type="radio" class="custom-control-input form-control @error('gender') is-invalid @enderror" name="gender" id="male" value="male" {{ $profile->gender === 'male' ? 'checked' : '' }}>
                                    <label for="male" class="custom-control-label">Male</label>
                                </div>
                                <div class="custom-control custom-radio d-inline">
                                    <input type="radio" class="custom-control-input form-control @error('gender') is-invalid @enderror" name="gender" id="female" value="female">
                                    <label for="female" class="custom-control-label" {{ $profile->gender === 'female' ? 'checked' : '' }}>Female</label>
                                
                                    @error('gender')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" placeholder="Address" value="{{ $profile->address }}" required>

                                @error('address')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Photo</label>
                                <div class="custom-file">
                                    <input type="file" class="form-control @error('file') is-invalid @enderror custom-file-input" name="file">
                                    <label class="custom-file-label"> {{ $profile->photo ? $profile->photo : 'Upload' }}</label>

                                    @error('file')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Bio</label>
                                <textarea class="form-control @error('bio') is-invalid @enderror" name="bio" placeholder="Bio" required>{{ $profile->bio }}</textarea>

                                @error('bio')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
            		<button class="btn btn-primary" type="submit">Update</button>
                </form>
		    </div>
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