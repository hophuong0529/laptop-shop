<nav class="navbar navbar-expand-lg navbar-light">
	<a class="navbar-brand" href="#" style="width: 50px;text-align: center;">
		<i class="fa fa-github-alt" style="font-size: 25px;"></i>
	</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	 <div class="collapse navbar-collapse" id="navbarCollapse">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item active">
				<a class="nav-link" href="/">TRANG CHỦ <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">GIỚI THIỆU</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">TIN TỨC</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">SẢN PHẨM</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">LIÊN HỆ</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">TUYỂN DỤNG</a>
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
			<li class="nav-item">
				<a class="nav-link" href="{{url('login')}}">Đăng nhập</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{url('register')}}">Đăng ký</a>
			</li>
			@endif
			<li class="nav-item">
				<a class="nav-link" href="{{url('cart')}}"><i class="fa fa-shopping-basket" style="font-size: 15px;"></i> Giỏ hàng</a>
			</li>
		</ul>		
	</div>
</nav>