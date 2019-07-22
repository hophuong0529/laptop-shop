@extends('admin.ad-nav')
@section('content')
<h1 style="padding: 30px; text-align: center;">Chỉnh sửa thông tin hóa đơn</h1>
<div>
	<form method="post" enctype="multipart/form-data">
		@csrf
		<table class="table table-boredred">
			<tbody>
				<tr>
					<td style="font-weight: bold;">Số hóa đơn : </td>
					<td>{{$order->id}}</td>
				</tr>
				<tr>					
					<td style="font-weight: bold;">Tên khách hàng :</td>
					<td>{{$order->orderUser->fullname}}</td>
				</tr>
				<tr>
					<td style="font-weight: bold;">Số điện thoại :</td>
					<td>{{$order->orderUser->mobile}}</td>
				</tr>
					<tr>
					<td style="font-weight: bold;">Địa chỉ :</td>
					<td>{{$order->orderUser->address}}</td>
				</tr>
				<tr>
					<td style="font-weight: bold;">Ngày lập hóa đơn :</td>
					<td>{{$order->orderDate}}</td>
				</tr>
				<tr>
					<td style="font-weight: bold;">Tiến độ :</td>
					<td>
						<input type="radio" name="status" value="1"<?=$order->status!=1?:'checked'?>> Chưa xử lý
						&emsp;<input type="radio" name="status" value="2"<?=$order->status!=2?:'checked'?>> Đang xử lý
						&emsp;<input type="radio" name="status" value="3"<?=$order->status!=3?:'checked'?>> Đã xử lý
					</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td><input type="submit" class="btn btn-success" value="Cập nhật">
						&nbsp;
						<a href="{{url('admin/orders')}}" class="btn btn-danger">Quay lại</a>
					</td>
				</tr>
			</tbody>	
		</table>
	</form>
</div>
@stop