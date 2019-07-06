<header class="container-fluid">
	<div class="row">
		<div class="col-md-4 title">
			<h1>LAPTOP</h1>
			<p>- UY TÍN<br>- CHẤT LƯỢNG</p>	
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
		</div>
		<div class="col-md-2" id="contact">
			<ul>
				<li>Gọi đặt hàng :<br><i class="fa fa-phone" style="font-size:15px "></i><span style="font-size: 13px"> 094.692.0529</span></li>
				<li>Gọi tư vấn :<br><i class="fa fa-phone" style="font-size:15px "></i><span style="font-size: 13px"> 035.981.3619</span></li>
			</ul>
		</div>
	</div>			
</header>
@include('layouts/nav')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-4">
			<img src="/img/left.jpg" style="width: 107%; padding-top: 20px; padding-left: 30px;">
		</div>
		<div class="col-md-8">
			@include('layouts/carousel')
		</div>
	</div>	
</div>		

