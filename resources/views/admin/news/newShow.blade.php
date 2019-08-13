@extends('admin.ad-nav')
@section('content')
<div class="row" style="margin: 30px 30px 30px 150px;">
	<div class="col-md-10">
		<h1 style="text-align: center;">Danh sách bài viết</h1>
	</div>
	<div class="col-md-2">
		<a href="{{url('admin/newAdd')}}" class="btn btn-success" style="width: 150px;"><i class="fa fa-plus"></i> Thêm</a>
	</div>
</div>
<table class="table" style="text-align: center;">
	<thead>
		<tr>
			<th width="8%">STT</th>
			<th width="30%">Hình ảnh</th>
			<th width="25%">Tiêu đề</th>
			<th width="20%">Ngày tạo</th>
			<th width="22%"></th>
		</tr>
	</thead>
	<tbody>
		@foreach($news as $new)
		<tr>
			<td>{{$new->id}}</td>
			<td><img src="/img/news/{{$new->imgNew}}" style="width: 250px; height: 100px;"></td>
			<td>{{$new->title}}</td>
			<td>{{$new->created_at}}</td>
			<td style="text-align: initial; padding-left: 70px;">
				<a style="padding-right: 40px; text-decoration: none;" class="fa fa-edit" href="{{url('admin/newEdit/'.$new->id)}}"></a>
				<a onclick="return confirm('Bạn có chắc chắn xóa?')" style="color: red; text-decoration: none;" class="fa fa-close" href="{{url('admin/newDelete/'.$new->id)}}"></a>
			</td>
		</tr>
		@endforeach 
	</tbody>
</table>
@stop