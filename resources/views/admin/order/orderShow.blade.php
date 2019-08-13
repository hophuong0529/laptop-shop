@extends('admin.ad-nav')
@section('content')
<div class="row" style="margin: 30px 30px 30px 150px;">
	<div class="col-md-10">
		<h1 style="text-align: center;">Danh sách hóa đơn</h1>
	</div>
	<div class="col-md-2">
		<a href="" class="btn btn-success" style="width: 150px;"><i class="fa fa-plus"></i> Thêm</a>
	</div>
</div>
<table class="table" style="text-align: center;">
	<thead>
		<tr>
			<th width="10%">SHĐ</th>
			<th width="20%">Tên khách hàng</th>
			<th width="20%">Số điện thoại</th>
			<th width="15%">Ngày lập hóa đơn</th>
			<th width="15%">Tiến độ</th>
			<th width="20%"></th>
		</tr>
	</thead>
	<tbody>
		@foreach($orders as $order)
		<tr>
			<td>{{$order->id}}</td>
			<td>{{$order->orderUser->fullname}}</td>
			<td>{{$order->orderUser->mobile}}</td>
			<td>{{$order->orderDate}}</td>
			<td>
				@if($order->status==1) Chưa xử lý
				@elseif($order->status==2) Đang xử lý
				@else Đã xử lý
				@endif
			</td>
			<td style="text-align: initial; padding-left: 100px;">
				<a style="padding-right: 40px; text-decoration: none;" class="fa fa-edit" href="{{url('admin/orderEdit/'.$order->id)}}"></a>
				<a onclick="return confirm('Bạn có chắc chắn xóa?')" style="color: red; text-decoration: none;" class="fa fa-close" href="{{url('admin/orderDelete/'.$order->id)}}"></a>
			</td>
		</tr>
		@endforeach 
	</tbody>
</table>
@stop