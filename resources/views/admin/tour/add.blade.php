@extends('admin.index')
@section('title','add tour')
@section('content')
<h2 style="text-align: center;">Thông tin tour</h2>
<form method="POST" action="add" class="col-md-9 col-xs-offset-2" enctype="multipart/form-data">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<table class="table table-bordered">
		<tr>
			<td class="col-md-2">Tên tour</td>
			<td><input type="text" name="tentour" required ></td>
		</tr>
		<tr>
			<td>Thời gian</td>
			<td><input type="text" name="thoigian" required="nhap" ></td>
		</tr>
		<tr>
			<td>Ngày khởi hành</td>
			<td><input type="text" name="ngaykh" required=""></td>
		</tr>

		<tr>
			<td>Hình ảnh</td>
			<td>
				<input type="file" required="" name="hinhanh" accept="image/*">
			</td>
		</tr>
		<tr>
			<td>Lịch trình</td>
			<td><input type="text" required="" name="lichtrinh" ></td>
		</tr>
		<tr>
			<td>Điểm khởi hành</td>
			<td><input type="text" required="" name="diemkh" ></td>
		</tr>
		<tr>
			<td>Chi tiết</td>
			<td>
				<textarea name="chitiet" id="chitiet" required style="width: 100%;"></textarea>
				<script language="javascript">CKEDITOR.replace('chitiet');</script>
			</td>
		</tr>
		<tr>
			<td>Đơn giá (VNĐ)</td>
			<td><input type="text" required="" name="dongia"></td>
		</tr>
		<tr>
			<td>Số lượng</td>
			<td><input type="number" required="" name="soluong"></td>
		</tr>
		<tr>
			<td>Keywords</td>
			<td><input type="text" required="" name="keywords"></td>
		</tr>
		<tr>
			<td>giảm giá</td>
			<td><input type="number" required="" name="giamgia"></td>
		</tr>
		<tr>
			<td>ghi chú</td>
			<td><input type="text" required="" name="ghichu"></td>			
		</tr>
		<tr>
			<td>tour hot</td>
			<td><input type="text" required="" name="tourhot"></td>
		</tr>
		<tr>
			<td colspan="2" style="text-align: center;">
				<button type="submit" name="" style="width: 85px; height: 80px; background-color: transparent; background-image: url('../../images/process-icon-button.png'); background-repeat: no-repeat; border-width: 0px;" value=""></button>  
				<a href="{{asset('admin/tour')}}"><input type="button" name="" style="width: 85px; height: 80px; background-color: transparent; background-image: url('../../images/cancel-icon-button.png'); background-repeat: no-repeat; border-width: 0px;" value="" /></a>
			</td>
		</tr>
	</table>
</form>
@endsection