<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="csrf-token" content="{{csrf_token()}}">
	<title>{{ $title ?? "" }}</title>
	<link rel="stylesheet" href="/css/app.css">	
	<link rel="stylesheet" href="/css/header.css">
	<link rel="stylesheet" href="/css/footer.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	@stack("styles")
</head>
<body>
	@include('layouts/header')
	@include('layouts/message')

	<div class="container-fluid row" style="padding-top: 0px">
		<div class="col-md-3" style="padding-right: 10px;">
			@include('layouts/left')
		</div>
		<div class="col-md-9 content" style="height: 1460px;">
			@yield("content")
		</div>	
	</div>	
	
	@include('layouts/news')
	
	<button class="btn" id="goTop">
		<i style="font-size: 26px; line-height: 35px;" class="fa fa-sort-up"></i>
	</button>

	@include('layouts/footer')
	<script src="/js/app.js?v={{env('APP_ENV') == 'local' ? time() : base64(2)}}"></script>	
	<script src="/js/nav.js"></script>
	@stack("scripts")

</body>
</html>	