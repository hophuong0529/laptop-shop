@extends('layouts.main')
@section('content')
@push("styles")
<link rel="stylesheet" href="/css/order.css">
@endpush
<div class="orders" style="padding-left: 150px;">
	<br>
	@if(session('alert'))
	<script>
		alert("Đặt hàng thành công. Vui lòng chờ điện thoại của bên giao hàng !");
		location = '.';
	</script>
	@endif
	<h1>Thông tin đơn hàng</h1>
	<br>
	<div>
		<h3>1. Thông tin khách hàng : </h3>
		<div class="col-md-9">
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
					<input type="submit" class="btn btn-primary" value="Cập nhật thông tin">
				</div>
			</form>
		</div>
	</div>
	<div style="padding-top: 20px;">
		<h3>2. Phương thức thanh toán :</h3>
		<form method="post">
			@csrf
			<div style="padding-right: 150px;">
				@foreach($ordermethods as $ordermethod)
				<div>
					&emsp;<input type="radio" name="methodId" checked value="{{$ordermethod->id}}"> {{$ordermethod->methodName}}
				</div>
				@endforeach
				<br><hr>
				<div class="form-group" style="padding-top: 10px; text-align: center;">
					<input type="submit" value="Đặt hàng" class="btn btn-success" style="width: 300px;">
				</div>
			</div>
		</form>	
	</div>
</div>
@stop