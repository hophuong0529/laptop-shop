@extends('admin.ad-nav')
@section('content')
<h1 style="padding: 30px;text-align: center;">Danh sách thành viên</h1>
<table class="table" style="text-align: center;">
	<thead>
		<tr>
			<th width="15%">Ảnh đại diện</th>
			<th width="15%">Tên khách hàng</th>
			<th width="15%">Tên đăng nhập</th>
			<th width="15%">Điện thoại</th>
			<th width="15%">Email</th>
			<th width="20%">Địa chỉ</th>
			<th width="5%"></th>
		</tr>
	</thead>
	<tbody>
		@foreach($members as $member)
		<tr>
			<td>
				<img width="50%" src="/img/users/{{$member->avatar}}" alt="">
			</td>
			<td>{{$member->fullname}}</td>
			<td>{{$member->username}}</td>
			<td>{{$member->mobile}}</td>
			<td>{{$member->email}}</td>
			<td>{{$member->address}}</td>
			<td><a onclick="return confirm('Bạn có chắc chắn xóa?')" class="fa fa-close" style="color: red;"href="{{url('admin/memberDelete/'.$member->id)}}"></a></td>
		</tr>
		@endforeach 
	</tbody>
</table>
@stop