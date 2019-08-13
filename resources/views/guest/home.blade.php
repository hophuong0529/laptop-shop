@extends('layouts.main')
@push("styles")
<link rel="stylesheet" href="/css/home.css">
@endpush
@section('content')
<div class="home">
	<i class="fa fa-github-alt" style="font-size: 25px;"></i>
	<span>&emsp;~~ Laptop World ~~&emsp;</span>
	<i class="fa fa-github-alt" style="font-size: 25px;"></i>
</div>
@include('guest.showProducts')	
@stop