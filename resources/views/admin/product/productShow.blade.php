@extends('admin.ad-nav')
@section('content')
<div class="row" style="margin: 30px 30px 30px 150px;">
	<div class="col-md-10">
		<h1 style="text-align: center;">Danh sách sản phẩm</h1>
	</div>
	<div class="col-md-2">
		<a href="{{url('admin/productAdd')}}" class="btn btn-success" style="width: 150px;"><i class="fa fa-plus"></i> Thêm</a>
	</div>
</div>
<table class="table" style="text-align: center;">
	<thead>
		<tr>
			<th width="20%">Hình ảnh</th>
			<th width="25%">Tên sản phẩm</th>
			<th width="20%">Giá sản phẩm</th>
			<th width="15%">Hãng</th>
			<th width="20%"></th>
		</tr>
	</thead>
	<tbody>
		@foreach($products as $product)
		<?php $has=0;?>
		@foreach($orderDetails as $orderDetail)
			@if($product->id==$orderDetail->productId)
				<?php $has=1; break;?>
			@endif
		@endforeach
		<tr>
			<td style="padding: 0.5px!important;">
				<img width="40%" src="/img/products/{{$product->productImage}}" alt="">
			</td>
			<td>{{$product->productName}}</td>
			<td>{{number_format($product->productPrice,0,',','.')}}</td>
			<td>{{$product->tenHang}}</td>
			<td style="text-align: initial; padding-left: 100px;">
				<a style="padding-right: 40px; text-decoration: none;" class="fa fa-edit" href="{{url('admin/productEdit/'.$product->id)}}"></a>
				<a onclick="return confirm('Bạn có chắc chắn xóa?')" style="display: <?=$has==0?:'none'?>; color: red; text-decoration: none;" class="fa fa-close" href="{{url('admin/productDelete/'.$product->id)}}"></a>
			</td>
		</tr>
		@endforeach 
	</tbody>
</table>
@stop