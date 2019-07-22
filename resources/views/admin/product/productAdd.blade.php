@extends('admin.ad-nav')
@section('content')
<h1 style="padding: 30px; text-align: center;">Thêm sản phẩm</h1>
<div>
	<form method="post" enctype="multipart/form-data">
		@csrf
		<table class="table table-boredred">
			<tbody>
				<tr>
					<td style="font-weight: bold;">Hãng : </td>
					<td>
						<select name="hangId">
							@foreach($brands as $hang)
							<option value="{{$hang->id}}">{{$hang->tenHang}}</option>
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
					<td>Chọn tệp :&emsp; <input type="file" name="productImage"></td>
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