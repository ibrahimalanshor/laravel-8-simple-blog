<!DOCTYPE html>
<html>
<head>
    @include('__includes.head')
</head>
<body>
    
	@include('__includes.topbar')
    
    <div class="d-flex wrapper">
        
    @include('__includes.sidebar')

        <div class="col p-4">
            @yield('content')
        </div>
    </div>

    @include('__includes.foot')

</body>
</html>