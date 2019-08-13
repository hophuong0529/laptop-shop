@extends('admin.ad-nav')
@section('content')
<h1 style="padding: 30px; text-align: center;">Chỉnh sửa thông tin hóa đơn</h1>
@if(session()->has('message'))
<div class="alert alert-success">
	{{ session()->get('message') }}
</div>
@endif
<div class="col-md-6" style="margin-left: 310px; border: gray thin solid; border-radius: 15px; padding: 50px;">
	<div>
		<form method="post" enctype="multipart/form-data">
			@csrf
			<div class="form-group">
				<label style="font-weight: bold;">Số hóa đơn :</label>
				<span>{{$order->id}}</span>
			</div>
			<hr>
			<div class="form-group">					
				<label style="font-weight: bold;">Tên khách hàng :</label>
				<span>{{$order->orderUser->fullname}}</span>
			</div>
			<hr>
			<div class="form-group">
				<label style="font-weight: bold;">Số điện thoại :</label>
				<span>{{$order->orderUser->mobile}}</span>
			</div>
			<hr>
			<div class="form-group">
				<label style="font-weight: bold;">Địa chỉ :</label>
				<span>{{$order->orderUser->address}}</span>
			</div>
			<hr>
			<div class="form-group">
				<label style="font-weight: bold;">Phương thức thanh toán :</label>
				<span>{{$order->orderMethod->methodName}}</span>
			</div>
			<hr>
			<div class="form-group">
				<label style="font-weight: bold;">Ngày lập hóa đơn :</label>
				<span>{{$order->orderDate}}</span>
			</div>
			<hr>
			<div class="form-group">
				<label style="font-weight: bold;">Tiến độ :</label>
				<input type="radio" name="status" value="1"<?=$order->status!=1?:'checked'?>> Chưa xử lý
				&emsp;<input type="radio" name="status" value="2"<?=$order->status!=2?:'checked'?>> Đang xử lý
				&emsp;<input type="radio" name="status" value="3"<?=$order->status!=3?:'checked'?>> Đã xử lý
			</div>
			<hr>
			<div class="form-group" style="text-align: center; padding-top: 20px;">
				<input style="width: 150px;" type="submit" class="btn btn-success" value="Cập nhật">
				&nbsp;
				<a style="width: 150px;" href="{{url('admin/orders')}}" class="btn btn-danger">Quay lại</a>
			</div>
		</form>
	</div>
</div>
@stop