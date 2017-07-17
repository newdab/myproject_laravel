@extends('admin.index')
@section('title','địa điểm')
@section('content')
<h2 style="text-align: center;">
	Quản lý Địa Điểm
	<small style="float: right; padding-right: 30px;"><a href="{{asset('admin/diadiem/add')}}"><img src="{{asset('images/button-add-icon.png')}}" alt=""></a></small>
</h2>
<table class="table table-bordered table-hover">
	<tr>
		<th style="text-align: center;">id</th>
		<th>Tên địa diểm</th>
		<th>Hình ảnh</th>
		<th>Mô tả</th>
		<th>action</th>
	</tr>
	@foreach($diadiem as $dd)
	<tr>
		<td>{{$dd->id}}</td>
		<td>{{$dd->tendiadiem}}</td>
		<td><img width="250px" height="250px" src="{{asset('images/gioithieu/' . $dd->hinhanh)}}"></td>
		<td>{{$dd->mota}}</td>
		<td>
			<a href="{{asset('admin/diadiem/edit/' . $dd->id)}}">Sửa</a>
			&nbsp;&nbsp;
			<a href="{{asset('admin/diadiem/delete/' .$dd->id)}}">Xóa</a>
		</td>
	</tr>
	@endforeach
</table>
{{$diadiem->links()}}
@endsection