@extends('layouts.main')
@push("styles")
<link rel="stylesheet" href="/css/login.css">
@endpush
@section('content')
<div class="login">

	<span>Đăng nhập</span>
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
			<label>Tên đăng nhập : </label>
			<input type="text" class="form-control" name="username">
		</section>
		<section class="form-group">
			<label>Mật khẩu : </label>
			<input type="password" class="form-control" name="password">
		</section>
		<section class="form-group">
			<input type="submit" class="btn btn-outline-dark btn-login" value="Đăng nhập">
		</section>
	</form>	
	
</div>
@stop