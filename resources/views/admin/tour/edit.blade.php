@extends('admin.index')
@section('title',' edit tour')
@section('content')
<h2 style="text-align: center;">Thông tin tour</h2>
<form method="POST"  action="test/{{$tour->id}}" class="col-md-9 col-xs-offset-2" enctype="multipart/form-data">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<table class="table table-bordered">
		<tr>
			<td class="col-md-2">Tên tour</td>
			<td><input type="text" name="tentour"  value="{{$tour->tentour}}"  required></td>
		</tr>
		<tr>
			<td>Thời gian</td>
			<td><input type="text" name="thoigian"  value="{{$tour->thoigian}}" required ></td>
		</tr>
		<tr>
			<td>Ngày khởi hành</td>
			<td><input type="text" name="ngaykh"  value="{{$tour->ngaykhoihanh}}" required></td>
		</tr>

		<tr>
			<td>Hình ảnh</td>
			<td>
			<img src="../../../images/place/{{$tour->hinhanh}}" style="width: 100px; height: 100px;">
				<input type="file" name="hinhanh" required>
			</td>
		</tr>
		<tr>
			<td>Lịch trình</td>
			<td><input type="text" name="lichtrinh" value="{{$tour->lichtrinh}}" required></td>
		</tr>
		<tr>
			<td>Điểm khởi hành</td>
			<td><input type="text"  name="diemkh" value="{{$tour->diemkhoihanh}}" required></td>
		</tr>
		<tr>
			<td>Chi tiết</td>
			<td>
				<textarea name="chitiet" id="chitiet"  style="width: 100%;">{{$tour->chitiet}}</textarea required>
				<script language="javascript">CKEDITOR.replace('chitiet');</script>
			</td>
		</tr>
		<tr>
			<td>Đơn giá (VNĐ)</td>
			<td><input type="text"  name="dongia" value="{{$tour->dongia}}" required></td>
		</tr>
		<tr>
			<td>Số lượng</td>
			<td><input type="number"  name="soluong" value="{{$tour->soluong}}" required></td>
		</tr>
		<tr>
			<td>Keywords</td>
			<td><input type="text" name="keywords" value="{{$tour->keywords}}" required></td>
		</tr>
		<tr>
			<td>giảm giá</td>
			<td><input type="number"  name="giamgia" value="{{$tour->giamgia}}" required></td>
		</tr>
		<tr>
			<td>ghi chú</td>
			<td><input type="text"  name="ghichu" value="{{$tour->ghichu}}" required></td>			
		</tr>
		<tr>
			<td>tour hot</td>
			<td><input type="text" name="tourhot" value="{{$tour->tourhot}}" required></td>
		</tr>
		<tr>
			<td colspan="2" style="text-align: center;">
				<button type="submit" name="" style="width: 85px; height: 80px; background-color: transparent; background-image: url('../../../images/process-icon-button.png'); background-repeat: no-repeat; border-width: 0px;" value=""></button>  
				<input type="button" name="" style="width: 85px; height: 80px; background-color: transparent; background-image: url('../../../images/cancel-icon-button.png'); background-repeat: no-repeat; border-width: 0px;" value="" /></a>
			</td>
		</tr>
	</table>
</form>
@endsection