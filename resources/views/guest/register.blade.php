@extends('layouts.main')
@push("styles")
<link rel="stylesheet" href="/css/register.css">
@endpush
@section('content')
<div class="login">

	<span>Đăng ký</span>
	<br><br>

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

	<form method="post">
		@csrf
		<section class="form-group">
			<label>Họ và tên : </label>
			<input type="text" class="form-control" name="fullname">
		</section>
		<section class="form-group">
			<label>Tên đăng nhập : </label>
			<input type="text" class="form-control" name="username">
		</section>
		<section class="form-group">
			<label>Mật khẩu : </label>
			<input type="password" class="form-control" name="password" min="6">
		</section>
		<section class="form-group">
			<label>Email : </label>
			<input type="text" class="form-control" name="email">
		</section>
		<section class="form-group">
			<label>Điện thoại : </label>
			<input type="text" class="form-control" name="mobile">
		</section>
		<section class="form-group">
			<label>Địa chỉ : </label>
			<input type="text" class="form-control" name="address">
		</section>
		<section class="form-group">
			<input type="submit" class="btn btn-outline-primary btn-login" value="Đăng ký">
			<input type="reset" class="btn btn-outline-danger btn-login" value="Nhập lại">
		</section>
	</form>	
	
</div>
@stop