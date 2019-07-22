@extends('admin.ad-nav')
@section('content')
<h1 style="padding: 30px; text-align: center;">Chỉnh sửa thông tin bài viết</h1>
<div>
	<form method="post" enctype="multipart/form-data">
		@csrf
		<table class="table table-boredred">
			<tbody>
				<tr>					
					<td style="font-weight: bold;">Tiêu đề :</td>
					<td><input name="title" type="text" value="{{$new->title}}" class="form-control"></td>
				</tr>
				<tr>
					<td style="font-weight: bold;">Hình ảnh sản phẩm :</td>
					<td>
						<img src="/img/news/{{$new->imgNew}}" style="float: left; padding-right: 50px; width: 500px; height: 200px;">
						Chọn tệp khác :&emsp;<br>
						<input type="file" name="imgNew">
					</td>
				</tr>
				<tr>
					<td style="font-weight: bold;">Nội dung :</td>
					<td>
						<textarea name="content" class="form-control" rows="10">{{$new->content}}</textarea>
						<!-- <script>CKEDITOR.replace('newDescription');</script> -->
					</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td><input type="submit" class="btn btn-success" value="Cập nhật thông tin">
						&nbsp;
						<a href="{{url('admin/news')}}" class="btn btn-danger">Quay lại</a>
					</td>
				</tr>
			</tbody>	
		</table>
	</form>
</div>
@stop