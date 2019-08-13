@extends('layouts.main')
@section('content')
<div style="padding-top: 50px; padding-right: 60px;">
	<div class="row">
		<div class="col-md-5"><img src="/img/products/{{$product->productImage}}" style="width: 90%;padding-left: 50px;"></div>
		<div class="col-md-7">
			<h1 style="color: #ba1826;">{{$product->productName}}</h1>
			<br>	
			<p><i class="fa fa-caret-right"></i><span style="font-weight: bold;"> Giao hàng và đổi trả hàng :</span> 
				<br>- Đổi hàng trong vòng 24h
				<br>- Giao hàng toàn quốc (Tính phí CPN)
				<br>- Thanh toán online đảm bảo hoặc thanh toán khi nhận hàng
			</p>
			<hr>
			<h2>Giá : <span style="color: #d0011b;">{{number_format($product->productPrice,0,',','.')}} ₫<span></h2>
				<br>	
				<a href="{{url('cart/add/'.$product->id)}}" class="btn btn-outline-danger" style="width: 200px;">Đặt mua</a>
			</div>
		</div>
		<div style="padding-left: 70px; padding-top: 60px;">
			<h4>Mô tả sản phẩm : </h4>
			<br>
			<p>{{$product->productDescription}}</p>
		</div>
	</div>
@stop