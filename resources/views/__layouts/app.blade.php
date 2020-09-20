<!DOCTYPE html>
<html>
<head>
    @include('__includes.app.head')
</head>
<body>

	<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
	<div class="container">
		<a href="{{ route('home') }}" class="navbar-brand">{{ site('name') }}</a>
		<div class="collapse navbar-collapse">
			<ul class="navbar-nav">
				<li class="nav-item"><a href="{{ route('category.home') }}" class="nav-link">Category</a></li>
			</ul>
		</div>
	</div>
	</nav>
    
    <div class="container py-5">
    	@yield('content')
    </div>

    @include('__includes.app.foot')

</body>
</html>