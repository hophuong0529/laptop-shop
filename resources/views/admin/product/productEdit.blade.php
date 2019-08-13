@extends('admin.ad-nav')
@section('content')
<h1 style="padding: 30px; text-align: center;">Chỉnh sửa thông tin sản phẩm</h1>
@if(session()->has('message'))
<div class="alert alert-success">
	{{ session()->get('message') }}
</div>
@endif
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
					<td style="font-weight: bold;" width="20%">Hãng : </td>
					<td>
						<select name="brandId" class="custom-select">
							@foreach($brands as $brand)
							<option value="{{$brand->id}}" <?=$product->brandId==$brand->id?'selected':''?>>{{$brand->tenHang}}</option>
							@endforeach
						</select>
					</td>
				</tr>
				<tr>					
					<td style="font-weight: bold;">Tên sản phẩm :</td>
					<td><input name="productName" type="text" value="{{$product->productName}}" class="form-control"></td>
				</tr>
				<tr>
					<td style="font-weight: bold;">Giá sản phẩm :</td>
					<td><input name="productPrice" type="text" value="{{$product->productPrice}}" class="form-control"></td>
				</tr>
				<tr>
					<td style="font-weight: bold;">Hình ảnh sản phẩm :</td>
					<td>
						<div class="row">
							<div class="col-md-6" style="padding-left: 100px;">
								<img src="/img/products/{{$product->productImage}}" width="60%">
							</div>
							<div class="col-md-6" style="padding-top: 20px;">
								<div class="custom-file">   
									<label class="custom-file-label" for="customFile">Chọn file ...</label>
									<input type="file" class="custom-file-input" name="productImage">
								</div>
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td style="font-weight: bold;">Trạng thái của sản phẩm :</td>
					<td>
						<input type="radio" name="status" value="1"<?=$product->status!=1?:'checked'?>> Active
						&emsp;<input type="radio" name="status" value="0"<?=$product->status!=0?:'checked'?>> Not Active
					</td>
				</tr>
				<tr>
					<td style="font-weight: bold;">Mô tả về sản phẩm :</td>
					<td>
						<textarea name="productDescription" class="form-control" rows="8">{{$product->productDescription}}</textarea>
						<!-- <script>CKEDITOR.replace('productDescription');</script> -->
					</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td><input type="submit" class="btn btn-success" value="Cập nhật thông tin">
						&nbsp;
						<a href="{{url('admin/products')}}" class="btn btn-danger">Quay lại</a>
					</td>
				</tr>
			</tbody>	
		</table>
	</form>
</div>
@stop