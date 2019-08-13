<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Đăng nhập quản trị viên</title>
	<link rel="stylesheet" href="/css/app.css">	
</head>
<body>
	<div class="col-md-6" style="margin-left: 350px; margin-top: 50px; padding: 60px; background-color: white; border-radius: 20px;">
		<h1 style="text-align: center;">Đăng nhập quản trị viên</h1>
		<br>
		@if(session('alert'))
		<section class="alert alert-danger">{{session('alert')}}</section>
		@endif
		@if ($errors->any())
		<div class="alert alert-danger">
			@foreach ($errors->all() as $error)
			{{ $error }}<br>
			@endforeach
		</div>
		@endif 
		<br>
		<form method="post">
			@csrf
			<section class="form-group">
				<label style="font-weight: bold;">Tên đăng nhập : </label>
				<input type="text" class="form-control" name="username">
			</section>
			<section class="form-group">
				<label style="font-weight: bold;">Mật khẩu : </label>
				<input type="password" class="form-control" name="password">
			</section>
			<section class="form-group">
				<input type="submit" class="btn btn-outline-dark" value="Đăng nhập">
			</section>
		</form>			
	</div>
</body>
</html>