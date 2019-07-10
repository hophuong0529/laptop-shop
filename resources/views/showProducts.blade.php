<section class="container-fluid">
	@if(count($products)==0)
		<section class="alert alert-info">No product !</section>
	@else
			<div class="container">
				<div class="row">
					@foreach ($products as $rs)
					<div class="col-xs-12 col-sm-6 col-md-3">	
						<div class="thumbnail">
							<img width="160px" height="175px" src="/img/products/{{$rs->productImage}}">
							<div class="productName">
								<a href="{{url('detailProduct/'.$rs->id)}}" style="color: #ba1826;">{{$rs->productName}}</a>
							</div>	
							<div class="price">
								{{number_format($rs->productPrice,0,',','.')}} vnd
							</div>
							<div class="order">
								<a href="{{url('cart/add/'.$rs->id)}}" class="btn btn-outline-danger" style="width: 100px;">Đặt mua</a>
							</div>
						</div>
					</div>
					@endforeach
				</div>			
			</div>	
	@endif	
</section>
