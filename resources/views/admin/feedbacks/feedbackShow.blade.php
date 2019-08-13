@extends('admin.ad-nav')
@section('content')
<br>
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
<h1 style="padding: 20px 30px 30px 30px; text-align: center;">Danh sách tin nhắn phản hồi</h1>
<table class="table" style="text-align: center;">
	<thead>
		<tr>
			<th width="15%">Tên người gửi</th>
			<th width="15%">Email</th>
			<th width="14%">Số điện thoại</th>
			<th width="15%">Tiêu đề</th>
			<th width="20%">Nội dung</th>
			<th width="11%">Tiến độ</th>
			<th width="10%"></th>
		</tr>
	</thead>
	<tbody>
		@foreach($feedbacks as $feedback)
		<tr>
			<td>{{$feedback->sender}}</td>
			<td>{{$feedback->email}}</td>
			<td>{{$feedback->mobile}}</td>
			<td>{{$feedback->title}}</td>
			<td>{{$feedback->content}}</td>
			<td>
				@if($feedback->status==0) Chưa phản hồi
				@else Đã phản hồi
				@endif
			</td>
			<td>
				@if($feedback->status==0)	
				<a style="text-decoration: none;" class="fa fa-reply" href="{{url('admin/feedbackReply/'.$feedback->id)}}"></a>
				@endif
				<a onclick="return confirm('Bạn có chắc chắn xóa?')" style="color: red; text-decoration: none; float: right; padding-right: 15px;" class="fa fa-close" href="{{url('admin/feedbackDelete/'.$feedback->id)}}"></a>
			</td>	
		</tr>
		@endforeach 
	</tbody>
</table>
@stop