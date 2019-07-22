@extends('admin.ad-nav')
@section('content')
<h1 style="padding: 30px; text-align: center;">Thêm bài viết</h1>
<div>
	<form method="post" enctype="multipart/form-data">
		@csrf
		<table class="table table-boredred">
			<tbody>
				<tr>					
					<td style="font-weight: bold;">Tiêu đề :</td>
					<td><input name="title" type="text" class="form-control"></td>
				</tr>
				<tr>
					<td style="font-weight: bold;">Hình ảnh sản phẩm :</td>
					<td>Chọn tệp khác :&emsp; <input type="file" name="imgNew"></td>
				</tr>
				<tr>
					<td style="font-weight: bold;">Nội dung :</td>
					<td>
						<textarea name="content" class="form-control" rows="10"></textarea>
						<!-- <script>CKEDITOR.replace('newDescription');</script> -->
					</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td><input type="submit" class="btn btn-success" value="Thêm bài viết">
						&nbsp;
						<a href="{{url('admin/news')}}" class="btn btn-danger">Quay lại</a>
					</td>
				</tr>
			</tbody>	
		</table>
	</form>
</div>
@stop