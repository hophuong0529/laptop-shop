@extends('layouts.main')
@section('content')
@push("styles")
<link rel="stylesheet" href="/css/cart.css">
@endpush
@if(session('cart'))
<?php 
$products=DB::table('products')->whereIn('id',array_keys(session('cart')))->get();
	// whereIn(laravel mới có) có 2 cột là id và 1 mảng chứa id đó
	//tương tự  select *from products where id in(array_keys(session('cart')))
?>
<br>
<?php $tongTien = 0; ?>			
<h1><center>Giỏ hàng của bạn</h1>
	<div style="padding-top: 20px; padding-left: 40px; padding-right: 40px; text-align: center;">
		<form method="post" action="{{url('cart/update')}}" id= "frm">
			@csrf
			<div class="cart row" style="font-weight: bold;color: #ba1826;padding-bottom: 10px;">
				<div class="col-md-2">Hình ảnh</div>
				<div class="col-md-2">Tên sản phẩm</div>	
				<div class="col-md-2">Giá sản phẩm</div>
				<div class="col-md-2">Số lượng</div>
				<div class="col-md-2">Thành tiền</div>
				<div class="col-md-2"></div>	
			</div>
			<hr>
			@foreach($products as $product)
			<div class="cart item row">
				<div class="col-md-2">
					<img src="/img/products/{{$product->productImage}}" alt="" style="width: 100%;">
				</div>
				<div class="col-md-2 text-cart">
					{{$product->productName}}
				</div>
				<div class="col-md-2 text-cart">
					{{number_format($product->productPrice,0,',','.')}} vnd
				</div>
				<div class="col-md-2 text-cart">
					<input class="form-control form-control-sm" min="1" max="99" type="number" name="{{$product->id}}" value='{{session("cart.$product->id")}}'>
				</div>
				<div class="col-md-2 text-cart">{{number_format($product->productPrice*session("cart.$product->id"),0,',','.')}}</div>
				<?php $tongTien = $tongTien + $product->productPrice*session("cart.$product->id"); ?>
				<div class="col-md-2 text-cart"><a onclick="return confirm('Bạn có chắc xóa sản phẩm này trong giỏ hàng ?');" href="{{url('cart/delete/'.$product->id)}}" class="btn btn-danger" style="width: 100px;">Xóa</a>
				</div>
			</div>
			<hr>
			@endforeach
			<div class="cart row" style="font-weight: bold;">
				<div class="col-md-2"></div>
				<div class="col-md-2"></div>
				<div class="col-md-2"></div>
				<div class="col-md-2" style="line-height: 55px;">Tổng tiền :</div>
				<div class="col-md-4" style="color: red; line-height: 50px; font-size: 18px;">{{number_format($tongTien,0,',','.')}} ₫</div>
			</div>
		</form>
		<hr>
		<div>
			<a onclick="return confirm('Bạn có chắc xóa tất cả trong giỏ hàng ?');" class="btn btn-danger" href="{{url('cart/deleteall')}}" style="width: 150px;">Xóa tất cả</a>
			&nbsp;
			<input type="submit" value="Cập nhật giỏ hàng" form="frm" class="btn btn-success" style="width: 150px;">
			&nbsp;
			<a href="{{url('cart/order')}}" class="btn btn-primary" style="width: 150px;">Đặt hàng</a></div>
		</div>
		@else
		<div style="text-align: center;" class="alert alert-warning">Giỏ hàng trống</div>
	</div>
	
	@endif
	@stop