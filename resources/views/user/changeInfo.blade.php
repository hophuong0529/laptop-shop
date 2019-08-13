@extends('layouts.main')
@push("styles")
<link rel="stylesheet" href="/css/info.css">
@endpush
@section('content')
<div class="info">
	<h1>Thay đổi thông tin tài khoản</h1>
	<form method="post" action="{{url('updateInfo')}}">
		@csrf 
		<div class="form-group">
			<label style="font-weight: bold;">Ảnh đại diện :</label>
			<div class="row">
				<div class="col-md-6" style="padding-top: 10px;">
					<img src="/img/users/{{$member->avatar}}" width="70%">
				</div>
				<div class="col-md-6" style="padding-top: 20px;">
					<div class="custom-file">   
						<label class="custom-file-label" for="customFile">Chọn file ...</label>
						<input type="file" class="custom-file-input" name="productImage">
					</div>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label style="font-weight: bold;">Họ và tên :</label>
			<input type="text" name="fullName" class="form-control" value="{{$member->fullname}}">
		</div>

		<div class="form-group">
			<label style="font-weight: bold;">Điện thoại :</label>
			<input type="tel" name="mobile" class="form-control" value="{{$member->mobile}}">
		</div>

		<div class="form-group">
			<label style="font-weight: bold;">Email :</label>
			<input type="email" name="email" class="form-control" value="{{$member->email}}">
		</div>

		<div class="form-group">
			<label style="font-weight: bold;">Địa chỉ :</label>
			<textarea class="form-control" name="address">{{$member->address}}</textarea>
		</div> 

		<div class="form-group">
			<input type="submit" class="btn btn-outline-primary" value="Cập nhật thông tin">
			&emsp;<a href="{{url('viewInfo')}}" class="btn btn-outline-danger">Quay lại</a>
		</div>
	</form>
</div>	
@stop