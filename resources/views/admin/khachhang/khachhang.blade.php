@extends('admin.index')
@section('title','khách hàng')
@section('content')
<h2 style="text-align: center;">
	Quản lý khách hàng
	<small style="float: right; padding-right: 30px;"><a href="{{asset('admin/khachhang/add')}}"><img src="{{asset('images/button-add-icon.png')}}" alt=""></a></small>
</h2>
<table class="table table-bordered table-hover">
	<tr>
		<th style="text-align: center;">id</th>
		<th>Tên khách </th>
		<th>Địa chỉ</th>
		<th>Điện thoại</th>
		<th>Email</th>
		<th></th>
	</tr>
	@foreach($khachhang as $kh)
	 <tr>
	 	<td>{{$kh->id}}</td>
	 	<td>{{$kh->tenkhach}}</td>
	 	<td>{{$kh->diachi}}</td>
	 	<td>{{$kh->dienthoai}}</td>
	 	<td>{{$kh->email}}</td>
	 	<td class="col-md-1" style="text-align: center;">
	 		<a href="{{asset('admin/khachhang/edit/' . $kh->id)}}">Sửa</a>&nbsp;
	 		<a href="{{asset('admin/khachhang/delete/' . $kh->id)}}">Xóa</a>
	 	</td>
	 </tr>
	 @endforeach
</table>
{{$khachhang->links()}}
@endsection