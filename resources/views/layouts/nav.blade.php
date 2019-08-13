<nav class="navbar navbar-expand-lg navbar-light">
	<a class="navbar-brand" href="#" style="width: 50px;text-align: center;">
		<i class="fa fa-github-alt" style="font-size: 25px;"></i>
	</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarCollapse">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item {{ request()->is('/') || request()->is('page=2') ? 'active' : '' }}">
				<a class="nav-link" href="/">TRANG CHỦ</a>
			</li>
			<li class="nav-item {{ request()->is('introduce') ? 'active' : '' }}">
				<a class="nav-link" href="{{url('introduce')}}">GIỚI THIỆU</a>
			</li>
			<li class="nav-item {{ request()->is('news') ? 'active' : '' }}">
				<a class="nav-link" href="{{url('news')}}">TIN TỨC</a>
			</li>
			<li class="nav-item dropdown {{ request()->is('search/mahang/*') ? 'active' : '' }}">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					SẢN PHẨM
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="{{url('search/mahang/1')}}">Laptop Dell</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="{{url('search/mahang/2')}}">Laptop Asus</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="{{url('search/mahang/3')}}">Laptop HP</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="{{url('search/mahang/4')}}">Macbook</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="{{url('search/mahang/5')}}">Laptop Acer</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="{{url('search/mahang/7')}}">Laptop Lenovo</a>
				</div>
			</li>
			<li class="nav-item {{ request()->is('contact') ? 'active' : '' }}">
				<a class="nav-link" href="{{url('contact')}}">LIÊN HỆ</a>
			</li>
		</ul>
		<ul class="navbar-nav justify-content-end">

			@if(session('user'))
			<li class="nav-item dropdown">
				<span class="nav-link dropdown-toggle active" data-toggle="dropdown">Xin chào, {{session('user')}}</span>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="{{url('viewInfo')}}">Xem thông tin tài khoản</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="{{url('logout')}}">Đăng xuất</a>
				</div>
			</li>
			@else
			<li class="nav-item {{ request()->is('login') ? 'active' : '' }}">
				<a class="nav-link" href="{{url('login')}}">Đăng nhập</a>
			</li>
			<li class="nav-item {{ request()->is('register') ? 'active' : '' }}">
				<a class="nav-link" href="{{url('register')}}">Đăng ký</a>
			</li>
			@endif
			<li class="nav-item {{ request()->is('cart') ? 'active' : '' }}">
				<a class="nav-link" href="{{url('cart')}}"><i class="fa fa-shopping-basket" style="font-size: 15px;"></i> Giỏ hàng</a>
			</li>
		</ul>		
	</div>
</nav>