@extends('admin.index')
@section('title','quan ly tour')
@section('content')
<h2 style="text-align: center;">
	Quản lý tour du lịch
	<small style="float: right; padding-right: 30px;"><a href="tour/add"><img src="{{asset('images/button-add-icon.png')}}" alt=""></a></small>
</h2>
<table class="table table-bordered table-hover">
	<tr>
		<th style="text-align: center;">id</th>
		<th>Tên Tour</th>
		<th>Thời gian</th>
		<th>Ngày khởi hành</th>
		<th>Hình ảnh</th>
		<th>Lịch trình</th>
		<th>Đơn giá (VNĐ)</th>
		<th></th>
	</tr>
	@foreach ($tours as $tour)
	<tr>
		<td>{{$tour->id}}</td>
	 	<td>{{$tour->tentour}}</td>
	 	<td>{{$tour->thoigian}}</td>
	 	<td>{{$tour->ngaykhoihanh}}</td>
	 	<td><img style="width: 100px; height: 100px;" src="../images/place/{{$tour->hinhanh}}"></td>
	 	<td>{{$tour->lichtrinh}}</td>
	 	<td>{{$tour->dongia}}</td>
	 	<td class="col-md-1" style="text-align: center;">
	 		<a href="tour/edit/{{$tour->id}}">Sửa</a>&nbsp;
	 		<a href="tour/delete/{{$tour->id}}">Xóa</a>
	 	</td>
	</tr>
	@endforeach
</table>
{{ $tours->links() }}
@endsection