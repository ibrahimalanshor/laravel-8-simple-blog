<div class="bg-white shadow-sm d-flex align-items-center justify-content-between topbar">
    <a href="{{ route('admin.home') }}" class="text-center icon text-dark d-block logo"><i class="icon ion-ios-basketball"></i></a>
    <div class="d-flex px-4">
    	<div class="dropdown">
    		<a href="#" class="icon text-dark d-block" id="user" data-toggle="dropdown"><i class="icon ion-ios-contact"></i></a>
    		<div class="dropdown-menu dropdown-menu-right">
    			<h6 class="dropdown-header">{{ Auth::user()->name }}</h6>
    			<a href="{{ route('home') }}" class="dropdown-item">Visit Blog</a>
    			<div class="dropdown-divider"></div>
    			<a href="#" onclick="confirm('Are You Sure') ? document.getElementById('logout').submit() : ''" class="dropdown-item">Logout</a>
    		</div>
    	</div>
    </div>
</div>