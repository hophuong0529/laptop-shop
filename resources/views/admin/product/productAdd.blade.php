@extends('admin.ad-nav')
@section('content')
<h1 style="padding: 30px; text-align: center;">Thêm sản phẩm</h1>
@if ($errors->any())
<div class="alert alert-danger">
	@foreach ($errors->all() as $error)
	{{ $error }}<br>
	@endforeach
</div>
@endif 
<div>
	<form method="post" enctype="multipart/form-data">
		@csrf
		<table class="table table-boredred">
			<tbody>
				<tr>
					<td style="font-weight: bold;" width="25%">Hãng : </td>
					<td>
						<select name="brandId" class="custom-select">		
							<option selected>Danh sách các hãng</option>
							@foreach($brands as $brand)
							<option value="{{$brand->id}}">{{$brand->tenHang}}</option>
							@endforeach
						</select>
					</td>
				</tr>
				<tr>					
					<td style="font-weight: bold;">Tên sản phẩm :</td>
					<td><input name="productName" type="text" class="form-control"></td>
				</tr>
				<tr>
					<td style="font-weight: bold;">Giá sản phẩm :</td>
					<td><input name="productPrice" type="text" class="form-control"></td>
				</tr>
				<tr>
					<td style="font-weight: bold;">Hình ảnh sản phẩm :</td>
					<td>
						<div class="custom-file">   
							<label class="custom-file-label" for="customFile">Chọn file ...</label>
							<input type="file" class="custom-file-input" name="productImage">
						</div>
					</td>
				</tr>
				<tr>
					<td style="font-weight: bold;">Trạng thái của sản phẩm :</td>
					<td>
						<input type="radio" name="status" value="1"> Active
						&emsp;<input type="radio" name="status" value="0"> Not Active
					</td>
				</tr>
				<tr>
					<td style="font-weight: bold;">Mô tả về sản phẩm :</td>
					<td>
						<textarea name="productDescription" class="form-control" rows="8"></textarea>
						<!-- <script>CKEDITOR.replace('productDescription');</script> -->
					</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td><input type="submit" class="btn btn-success" value="Thêm sản phẩm">
						&nbsp;
						<a href="{{url('admin/products')}}" class="btn btn-danger">Quay lại</a>
					</td>
				</tr>
			</tbody>	
		</table>
	</form>
</div>
@stop