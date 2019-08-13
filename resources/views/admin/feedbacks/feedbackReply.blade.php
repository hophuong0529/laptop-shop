@extends('admin.ad-nav')
@section('content')
<h1 style="padding: 30px; text-align: center;">Trả lời phản hồi</h1>
@if ($errors->any())
<div class="alert alert-danger">
	@foreach ($errors->all() as $error)
	{{ $error }}<br>
	@endforeach
</div>
@endif
<div class="col-md-6" style="margin-left: 310px;">
	<form method="post" enctype="multipart/form-data">
		@csrf
		<div class="form-group">					
			<label style="font-weight: bold;">Người gửi :</label>
			<span>&emsp;{{$feedback->sender}}</span>
		</div>
		<hr>
		<div class="form-group">					
			<label style="font-weight: bold;">Email :</label>
			<span>&emsp;{{$feedback->email}}</span>
		</div>
		<hr>
		<div class="form-group">					
			<label style="font-weight: bold;">Số điện thoại :</label>
			<span>&emsp;{{$feedback->mobile}}</span>
		</div>
		<hr>
		<div class="form-group">					
			<label style="font-weight: bold;">Tiêu đề :</label>
			<span>&emsp;{{$feedback->title}}</span>
		</div>
		<hr>
		<div class="form-group">					
			<label style="font-weight: bold;">Nội dung :</label>
			<span>&emsp;{{$feedback->content}}</span>
		</div>
		<hr>
		<div class="form-group">
			<label style="font-weight: bold;">Trả lời phản hồi :</label>
			<textarea name="reply" class="form-control" rows="5">{{$feedback->reply}}</textarea>
		</div>
		<div class="form-group" style="text-align: center; padding-top: 20px;">
			<input style="width: 150px;" type="submit" class="btn btn-success" value="Phản hồi">
			&nbsp;
			<a style="width: 150px;" href="{{url('admin/feedbacks')}}" class="btn btn-danger">Quay lại</a>
		</div>		
	</form>
</div>
@stop