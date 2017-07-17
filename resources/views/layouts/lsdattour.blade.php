@extends('layouts.index')
@section('pages')
<div class="giohang">
	<div class="category">Lịch sử đặt tour</div>
		<table border="1" cellpadding="5" style="border-collapse: collapse; width: 100%;">
			<tr>
				<th>STT</th>
				<th>Tour đặt</th>
				<th>Ngày đặt</th>
				<th>Ngày khởi hành</th>
				<th>Đơn giá (VNĐ)</th>
				<th>Số người</th>
				<th>Thành tiền (VNĐ)</th>
			</tr>
			@foreach($dattour as $dt)
			<tr>
				<td>{{$loop->index+1}}</td>
				<td>{{$dt->tentour}}</td>
				<td>{{$dt->ngaydat}}</td>
				<td>{{$dt->ngaykhoihanh}}</td>
				<td>{{$dt->dongia}}</td>
				<td>{{$dt->songuoi}}</td>
				<td>{{$dt->thanhtien}}</td>
			</tr>
			@endforeach
			</table>
			</div>
@endsection
