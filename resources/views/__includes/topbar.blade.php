<div class="bg-white shadow-sm d-flex align-items-center justify-content-between topbar">
    <a href="{{ route('user.home') }}" class="text-center icon text-dark d-block logo"><i class="icon ion-ios-basketball"></i></a>
    <div class="d-flex px-4">
    	<div class="dropdown">
    		<a href="#" class="icon text-dark d-block" id="user" data-toggle="dropdown"><img src="{{ img(Auth::user()->profile->photo ? Auth::user()->profile->photo : 'default.jpg') }}" style="width: 30px; height: 30px; object-fit: cover;" class="rounded-circle"></a>
    		<div class="dropdown-menu dropdown-menu-right">
    			<h6 class="dropdown-header">{{ Auth::user()->name }}</h6>
    			<a href="{{ route('home') }}" class="dropdown-item">Visit Blog</a>
    			<a href="{{ route('user.profile.index') }}" class="dropdown-item">Profile</a>
    			<div class="dropdown-divider"></div>
    			<a href="#" onclick="confirm('Are You Sure') ? document.getElementById('logout').submit() : ''" class="dropdown-item">Logout</a>
    		</div>
    	</div>
    </div>
</div>