@extends('layouts.main')
@push("styles")
<link rel="stylesheet" href="/css/info.css">
@endpush
@section('content')
<div class="info">
<h1>Thông tin tài khoản</h1>
<div>
	<center><img src="/img/users/{{$member->avatar}}" style="width: 150px;height: 150px; border-radius: 50%;"></center>
</div>
<hr>
<div class="form-group">
	<label>Họ và tên :</label>
	<span>{{$member->fullname}}</span>
	<hr>
</div>
<div class="form-group">
	<label>Điện thoại :</label>
	<span>{{$member->mobile}}</span>
	<hr>
</div>
<div class="form-group">
	<label>Email :</label>
	<span>{{$member->email}}</span>
	<hr>
</div>
<div class="form-group">
	<label>Địa chỉ :</label>
	<span>{{$member->address}}</span>
</div> 
<div class="form-group">
	<a href="{{url('changeInfo')}}" class="btn btn-success">Thay đổi thông tin ...</a>
</div>
</div>
@stop