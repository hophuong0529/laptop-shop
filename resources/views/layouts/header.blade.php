<header class="container-fluid">
	<div class="row">
		<div class="col-md-4 title">
			<h1>LAPTOP</h1>
			<p><i class="fa fa-check"></i> UY TÍN<br><i class="fa fa-check"></i> CHẤT LƯỢNG</p>	
		</div>
		<div class="col-md-5">
			<form method="get" action="{{url('search/findKey')}}">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Nhập tên sản phẩm cần tìm ..." name="keyword">
					<div class="input-group-btn">
						<button class="btn btn-light">
							<i class="fa fa-search"></i>
						</button>
					</div>
				</div>
			</form>
			<div class="text">
				<p><i class="fa fa-star"></i> Hệ thống bán lẻ laptop cũ, mới số 1 Việt Nam.</p>
			</div>
		</div>
		<div class="col-md-3" id="contact">
			<ul>
				<li>Gọi đặt hàng :<br><i class="fa fa-phone" style="font-size:15px "></i><span style="font-size: 13px"> 094.692.0529</span></li>
				<li>Gọi tư vấn :<br><i class="fa fa-phone" style="font-size:15px "></i><span style="font-size: 13px"> 035.981.3619</span></li>
			</ul>
		</div>
	</div>			
</header>
@include('layouts/nav')
<div class="container-fluid" id="ads" style="display: none;">
	<div class="row">
		<div class="col-md-3">
			<img src="/img/left1.jpg" style="width: 385px;height: 313.2px; padding-top: 20px; padding-left: 45px;">
		</div>
		<div class="col-md-9" style="padding-left: 40px;">
			@include('layouts/carousel')
		</div>
	</div>	
</div>		

