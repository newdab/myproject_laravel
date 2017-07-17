@extends('admin.index')
@section('title','đặt tour')
@section('content')
<h2 style="text-align: center;">
	Quản lý Đơn đặt tour
	<small style="float: right; padding-right: 30px;"><a href="{{asset('admin/dattour/add')}}"><img src="{{asset('images/button-add-icon.png')}}" alt=""></a></small>
</h2>
<form action="{{asset('admin/dattour/timkiem')}}" method="get">

	<select name="tentour" style="width: 200px;">
		 <option value="%">-- tên tour --</option>
		 @foreach($tour as $tour)
		 <option value="{{$tour->tentour}}">
		 	{{$tour->tentour}}
		 </option>
		 @endforeach
	</select>
<select name="trangthai">
	<option value="0">--chưa duyệt--</option>
	<option value="1">--đã duyệt --</option>
</select>
<input type="submit" class="btnSearch" style="width: 70px" value="Lọc" />
</form>
<table class="table table-bordered table-hover">
	<tr>
		<th style="text-align: center;">id</th>
		<th>Tên tour</th>
		<th>Tên khách </th>
		<th>ngày đặt </th>
		<th>Số người</th>
		<th>đơn giá</th>
		<th>Thành tiền</th>
		<th>Trạng thái</th>
		<th></th>
	</tr>
	@foreach($dattour as $hotel)
	<tr>
		<td>{{$hotel->id}}</td>
		<td>{{$hotel->tentour}}</td>
		<td>{{$hotel->tenkhach}}</td>
		<td>{{$hotel->ngaydat}}</td>
		<td>{{$hotel->songuoi}}</td>
		<td>{{$hotel->dongia}}</td>
		<td>{{$hotel->thanhtien}}</td>
		<td>
		@if($hotel->trangthai==1)
			đã duyệt
		@else
		 	chưa duyệt
		@endif
		</td>
		<td class="col-md-1" style="text-align: center;">
	 		<a href="{{asset('admin/dattour/edit/' . $hotel->id)}}">Sửa</a>&nbsp;
	 		<a href="{{asset('admin/dattour/delete/' . $hotel->id)}}">Xóa</a>
	 	</td>
	</tr>
	@endforeach
</table>
{{$dattour->links()}}
@if(isset($trangthai))
@endif
@endsection
