@extends('admin.index')
@section('title','khach san')
@section('content')
<h2 style="text-align: center;">
	Quản lý khách sạn
	<small style="float: right; padding-right: 30px;"><a href="{{asset('admin/khachsan/add')}}"><img src="{{asset('images/button-add-icon.png')}}" alt=""></a></small>
</h2>
<table class="table table-bordered table-hover">
	<tr>
		<th style="text-align: center;">id</th>
		<th>Tên khách sạn</th>
		<th>chất lượng</th>
		<th>địa chỉ</th>
		<th>điện thoại</th>
		<th></th>
	</tr>
	@foreach($hotels as $hotel)
	<tr>
		<td>{{$hotel->id}}</td>
		<td>{{$hotel->tenkhs}}</td>
		<td>{{$hotel->chatluong}}</td>
		<td>{{$hotel->diachi}}</td>
		<td>{{$hotel->dienthoai}}</td>
		<td class="col-md-1" style="text-align: center;">
	 		<a href="{{asset('admin/khachsan/edit/' . $hotel->id)}}">Sửa</a>&nbsp;
	 		<a href="{{asset('admin/khachsan/delete/' . $hotel->id)}}">Xóa</a>
	 	</td>
	</tr>
	@endforeach
</table>
{{$hotels->links()}}
@endsection
