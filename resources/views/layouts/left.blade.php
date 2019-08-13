<div class="list-group">

  <h6 class="list-group-item header"><i class="fa fa-bars"></i>&emsp;DANH MỤC SẢN PHẨM</h6>

  <?php $brands=DB::table('brands')->where('status',1)->get(); ?>

   @foreach($brands as $brand)

  <a href="{{url('search/mahang/'.$brand->id)}}" class="list-group-item list-group-item-action">{{$brand->tenHang}}</a>

  @endforeach

</div>  

<div class="list-group" style="padding-top: 19px;">

	<h6 class="list-group-item header"><i class="fa fa-bars"></i>&emsp;GIÁ SẢN PHẨM</h6>

	<?php $prices=DB::table('prices')->get(); ?>

	@foreach($prices as $price)

	<a href="{{url('search/mucgia/'.$price->id)}}" class="list-group-item list-group-item-action">{{$price->priceName}}</a>

	@endforeach

</div>
<div id="ads2" style="display: block;">	
	<img src="/img/left2.jpg" width="100%" style="padding: 19.5px 5px 0px 15px">
</div>
