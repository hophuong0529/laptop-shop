@extends('layouts.main')
@push("styles")
<link rel="stylesheet" href="/css/home.css">
@endpush
@section('content')
<div class = "home">
	<i class="fa fa-github-alt" style="font-size: 25px;"></i>
	<span>&emsp;~~ Laptop World ~~&emsp;</span>
	<i class="fa fa-github-alt" style="font-size: 25px;"></i>
</div>
@include('showProducts')
<div style="float: right; display: none;">
	<ul class="pagination">
		<li class="page-item active" aria-current="page">
			<button class="page-link" href="#" style="background-color: rgb(255,106,2); border: none;">1<span class="sr-only">(current)</span></button>
		</li>
		<li class="page-item">
			<button class="page-link" href="#">2</button>
		</li>
		<li class="page-item">
			<button class="page-link" href="#">3</button>
		</li>
		<li class="page-item">
			<button class="page-link" href="#">...</button>
		</li>
		<li class="page-item">
			<button class="page-link" href="#"><i class="fa fa-angle-double-right"></i></button>
		</li>
	</ul>	
</div>	
@stop