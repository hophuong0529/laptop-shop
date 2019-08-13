<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="csrf-token" content="{{csrf_token()}}">
	<title>{{ $title ?? "" }}</title>
	<link rel="stylesheet" href="/css/app.css">	
	@stack("styles")
</head>
<style>
	body{
		background-color: white;
		font-family: Arial;
		font-size: 15px;
	}
</style>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	&emsp;
	<a class="navbar-brand" href="{{url('admin')}}" style="background-color: rgb(255,106,2); padding: 8px; color: black; border-radius: 5px;">Trang quản trị Admin</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	 <div class="collapse navbar-collapse" id="navbarCollapse">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item {{ request()->is('admin') || request()->is('admin/products') ? 'active' : '' }}">
				<a class="nav-link" href="{{url('admin/products')}}">SẢN PHẨM</a>
			</li>
			<li class="nav-item {{ request()->is('admin/orders') ? 'active' : '' }}">
				<a class="nav-link" href="{{url('admin/orders')}}">HÓA ĐƠN</a>
			</li>
			<li class="nav-item {{ request()->is('admin/news') ? 'active' : '' }}">
				<a class="nav-link" href="{{url('admin/news')}}">TIN TỨC</a>
			</li>
			<li class="nav-item {{ request()->is('admin/members') ? 'active' : '' }}">
				<a class="nav-link" href="{{url('admin/members')}}">NGƯỜI DÙNG</a>
			</li>
			<li class="nav-item {{ request()->is('admin/feedbacks') ? 'active' : '' }}">
				<a class="nav-link" href="{{url('admin/feedbacks')}}">PHẢN HỒI</a>
			</li>
		</ul>
		<ul class="navbar-nav justify-content-end">
		
			<li class="nav-item dropdown">
				<span class="nav-link dropdown-toggle active" data-toggle="dropdown">Xin chào Boss, {{session('userAdmin')}} </span>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="{{url('admin/logout')}}">Đăng xuất</a>
				</div>
			</li>
		</ul>		
	</div>
</nav>
<div style="margin: 0px 50px 50px 50px;">
@yield("content")
</div>
<script src="/js/app.js?v={{env('APP_ENV') == 'local' ? time() : base64(2)}}"></script>	
</body>	
</html>