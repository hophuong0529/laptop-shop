@extends('admin.ad-nav')
@section('content')
<h1 style="padding: 30px; text-align: center;">Chỉnh sửa thông tin bài viết</h1>
@if(session()->has('message'))
<div class="alert alert-success">
	{{ session()->get('message') }}
</div>
@endif
<div>
	<form method="post" enctype="multipart/form-data">
		@csrf
		<table class="table table-boredred">
			<tbody>
				<tr>					
					<td style="font-weight: bold;" width="20%">Tiêu đề :</td>
					<td><input name="title" type="text" value="{{$new->title}}" class="form-control"></td>
				</tr>
				<tr>
					<td style="font-weight: bold; width: 200px;">Hình ảnh sản phẩm :</td>
					<td>
						<div class="row">
							<div class="col-md-6">
								<img src="/img/news/{{$new->imgNew}}" width="95%">
							</div>
							<div class="col-md-6" style="padding-top: 20px;">
								<div class="custom-file">   
									<label class="custom-file-label" for="customFile">Chọn file ...</label>
									<input type="file" class="custom-file-input" name="imgNew">
								</div>
							</div>
						</div>
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