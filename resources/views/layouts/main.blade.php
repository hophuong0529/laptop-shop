<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="csrf-token" content="{{csrf_token()}}">
	<title></title>
	<link rel="stylesheet" href="/css/app.css">	
	<link rel="stylesheet" href="/css/header.css">
	@stack("styles")
</head>
<body>
	@include('layouts/header')
	<div class="container-fluid row">
		<div class="col-md-3">
			@include('layouts/left')
		</div>
		<div class="col-md-9 content">
			@yield("content")
		</div>	
	</div>
	
	<script src="/js/app.js?v={{env('APP_ENV') == 'local' ? time() : base64(2)}}"></script>	
	@stack("scripts")
</body>
</html>	