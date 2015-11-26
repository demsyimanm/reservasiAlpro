<!DOCTYPE html>
<html lang="en">
@include('admin.master.header')
@include('admin.master.footer')	
@include('admin.master.navbar')
<body class="hold-transition skin-blue fixed sidebar-mini">
	<div class="wrapper">
		
		<div class="content-wrapper">
			@yield('content')
		</div>
    </div>

</body>
</html>
