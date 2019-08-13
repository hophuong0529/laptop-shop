<section class="container-fluid" style="position: relative;">
	@if(count($products)==0)
	<section class="alert alert-info">Không tìm thấy sản phẩm !</section>
	@else
	<div class="container">
		<div class="row">
			@foreach ($products as $rs)
			<div class="col-xs-12 col-sm-8 col-md-3" style="padding-right: 0px;">	
				<div class="thumbnail" style="position: relative; text-align: center;">
					<img width="82%" src="/img/products/{{$rs->productImage}}" class="imgProduct">
					<div style="z-index: 2; position: inherit;">
						<div class="productName">
							<a href="{{url('detailProduct/'.$rs->id)}}" style="color: #ba1826;">{{$rs->productName}}</a>
						</div>	
						<div class="price">
							{{number_format($rs->productPrice,0,',','.')}} vnđ
						</div>
						<div class="order">
							<a href="{{url('cart/add/'.$rs->id)}}" class="btn btn-outline-danger" style="width: 100px;">Đặt mua</a>
						</div>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>				
	@endif	
	<div id="pagination">
		<ul class="pagination">
			<li class="page-item">
				<a class="page-link" href="/"><i class="fa fa-angle-double-left"></i></a>
			</li>
			<li class="page-item {{ request()->is('/') ? 'active' : '' }}">
				<a class="page-link" href="/">1</a>
			</li>
			<li class="page-item {{ request()->is('page=2') ? 'active' : '' }}">
				<a class="page-link" href="{{url('page=2')}}">2</a>
			</li>
			<li class="page-item">
				<a class="page-link" href="{{url('page=2')}}"><i class="fa fa-angle-double-right"></i></a>
			</li>
		</ul>	
	</div>
</section>
