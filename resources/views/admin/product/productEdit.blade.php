@extends('admin.ad-nav')
@section('content')
<h1 style="padding: 30px; text-align: center;">Chỉnh sửa thông tin sản phẩm</h1>
<div>
	<form method="post" enctype="multipart/form-data">
		@csrf
		<table class="table table-boredred">
			<tbody>
				<tr>
					<td style="font-weight: bold;">Hãng : </td>
					<td>
						<select name="hangId">
							@foreach($brands as $brand)
							<option value="{{$brand->id}}" <?=$product->hangId!=$brand->id?:'selected'?>>{{$brand->tenHang}}</option>
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
						<img width="20%" src="/img/products/{{$product->productImage}}">
						<br>Chọn tệp khác :&emsp; 
						<input type="file" name="productImage">
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