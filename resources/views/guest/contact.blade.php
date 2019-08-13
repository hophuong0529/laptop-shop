@extends('layouts.main')
@section('content')

<img src="/img/contact.jpg" alt="" width="99%" style="padding-left: 15px;">
<div style="padding-left: 120px;"  class="col-md-10">	
	<h1 style="padding-top: 30px; text-align: center;">Liên hệ</h1>
	<br>
	<div style="padding-left: 80px;color: #ba1826;">
		<p>Mọi ý kiến đóng góp xin vui lòng điền vào Form dưới đây và gửi cho 
			chúng tôi.
			<br>Xin chân thành cảm ơn !
		</p>
	</div>
	@if ($errors->any())
	<div class="alert alert-danger">
		@foreach ($errors->all() as $error)
		{{ $error }}<br>
		@endforeach
	</div>
	@endif 
	<br>
	<form method="post" enctype="multipart/form-data">
		@csrf
		<table class="table table-borderless">
			<tbody>
				<tr>
					<td style="font-weight: bold;">Họ và tên : </td>
					<td>
						<input name="sender" type="text" class="form-control">
					</td>
				</tr>
				<tr>
					<td style="font-weight: bold;">Email :</td>
					<td><input name="email" type="text" class="form-control"></td>
				</tr>
				<tr>
					<td style="font-weight: bold;">Điện thoại :</td>
					<td><input name="mobile" type="text" class="form-control"></td>
				</tr>
				<tr>
					<td style="font-weight: bold;">Tiêu đề :</td>
					<td>
						<input name="title" type="text" class="form-control">
					</td>
				</tr>
				<tr>
					<td style="font-weight: bold;">Nội dung :</td>
					<td>
						<textarea name="content" class="form-control" rows="5"></textarea>
					</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td><input type="submit" class="btn btn-success" value="Gửi đi" onclick="return confirm('Bạn có chắc chắn gửi đi?')">
						&nbsp;
						<input type="reset" class="btn btn-danger" value="Nhập lại">
					</td>
				</tr>
			</tbody>	
		</table>
	</form>
</div>
@stop