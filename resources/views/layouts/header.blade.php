<header class="container-fluid" id="login_wrapper">
	<div class="row">
		<div class="col-md-3 title">
			<h1>LAPTOP</h1>
			<p><i class="fa fa-check"></i> UY TÍN<br><i class="fa fa-check"></i> CHẤT LƯỢNG</p>	
		</div>
		<div class="col-md-6">
			<form method="get" action="{{url('search/findKey')}}">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Nhập tên sản phẩm cần tìm ..." name="keyword" autocomplete="off">
					<div class="input-group-append">
						<button class="btn btn-light">
							<i class="fa fa-search"></i>
						</button>
					</div>
				</div>
			</form>
			<div class="text" style="padding-left: 40px;">
				<p><i class="fa fa-star"></i> Hệ thống bán lẻ laptop cũ, mới số 1 Việt Nam.</p>
			</div>
		</div>
		<div class="col-md-3" id="contact" style="padding-right: 0px;">
			<ul class="container-fluid">
				<li class="row">
					<i class="fa fa-phone"></i>&nbsp;Gọi tư vấn : <span style="font-size: 13.5px; color: rgb(255,106,2); font-style: italic;">&emsp;&nbsp;&nbsp;&nbsp;035.981.3619</span>
				</li>
				<li class="row">
					<i class="fa fa-phone"></i>&nbsp;Gọi đặt hàng : <span style="font-size: 13.5px; color: rgb(255,106,2); font-style: italic;">&nbsp;&nbsp;094.692.0529</span>
				</li>
				<li class="row" style="padding-top: 10px;">
					<span><i class="fa fa-angle-double-right" style="font-size: 16px; line-height: 15px;"></i>&nbsp;<span style="font-size: 14px; color: rgb(255,106,2); font-weight: bold;">&nbsp;MIỄN PHÍ GIAO HÀNG TOÀN QUỐC</span></span>
				</li>
				<li class="row">
					<span><i class="fa fa-angle-double-right" style="font-size: 16px; line-height: 15px;"></i>&nbsp;<span style="font-size: 14px; color: rgb(255,106,2); font-weight: bold">CAM KẾT CHẤT LƯỢNG SẢN PHẨM</span></span>
				</li>
			</ul>
		</div>
	</div>			
</header>
@include('layouts/nav')
<div class="container-fluid" id="ads" style="display: none;">
	<div class="row">
		<div class="col-md-4" style="padding-right: 0px;">
			<img src="/img/left1.jpg" width="98%" style="padding-top: 10px; padding-left: 55px;">
		</div>
		<div class="col-md-8" style="padding-left: 0px; right: 33px;">
			@include('layouts/carousel')
		</div>
	</div>	
</div>		

