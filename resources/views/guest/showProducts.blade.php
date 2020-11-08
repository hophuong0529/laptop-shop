<section class="container-fluid" style="position: relative;">
	@if(count($products)==0)
	<section class="alert alert-info">Không tìm thấy sản phẩm !</section>
	@else
	<div class="container">
		<div class="row">
			@foreach ($products as $product)
			<div class="col-xs-12 col-sm-8 col-md-3" style="padding-right: 0px;">	
				<div class="thumbnail" style="position: relative; text-align: center;">
					<img width="82%" src="/img/products/{{ $product->productImage }}" class="imgProduct">
					<div style="z-index: 2; position: inherit;">
						<div class="productName">
							<a href="{{ url('detailProduct/'.$product->id) }}" style="color: #ba1826;">{{ $product->productName }}</a>
						</div>	
						<div class="price">
							{{ number_format($product->productPrice,0,',','.') }} VNĐ
						</div>
						<div class="order">
							<a href="{{ url('cart/add/'.$product->id) }}" class="btn btn-outline-danger" style="width: 100px;">Đặt mua</a>
						</div>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>				
	@endif	
	<div id="pagination">
		<div class="d-flex justify-content-center">
            {{ $products->links() }}
    	</div>
	</div>
</section>
