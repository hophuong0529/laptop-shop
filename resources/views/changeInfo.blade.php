@extends('layouts.main')
@push("styles")
<link rel="stylesheet" href="/css/info.css">
@endpush
@section('content')
<div class="info">
	<h1>Thay đổi thông tin tài khoản</h1>
	<form method="post" action="{{url('updateinfo')}}">
		@csrf 
		<div class="form-group">
			<label>Họ và tên :</label>
			<input type="text" name="fullName" class="form-control" value="{{$member->fullname}}">
		</div>

		<div class="form-group">
			<label>Điện thoại :</label>
			<input type="tel" name="mobile" class="form-control" value="{{$member->mobile}}">
		</div>

		<div class="form-group">
			<label>Email :</label>
			<input type="email" name="email" class="form-control" value="{{$member->email}}">
		</div>

		<div class="form-group">
			<label>Địa chỉ :</label>
			<textarea class="form-control" name="address">{{$member->address}}</textarea>
		</div> 

		<div class="form-group">
			<input type="submit" class="btn btn-outline-primary" value="Cập nhật thông tin">
			&emsp;<a href="{{url('viewInfo')}}" class="btn btn-outline-danger">Quay lại</a>
		</div>
	</form>
</div>	
@stop