@extends('admin.index')
@section('title','hình ảnh -tour')
@section('content')
<h2 style="text-align: center;">
	Quản lý Hình ảnh tour
	<small style="float: right; padding-right: 30px;"><a href="{{asset('admin/image/add')}}"><img src="{{asset('images/button-add-icon.png')}}" alt=""></a></small>
</h2>
<form method="get" action="{{asset('admin/image/sort')}}" >
<select name="matour" id="matour">
	<option value="">-- tên tour --</option>
	@foreach($tour as $tour)
	<option value="{{$tour->id}}">{{$tour->tentour}}</option>
	@endforeach
</select>
<input type="submit" name="" value="Lọc">
</form>
<table class="table table-bordered table-hover" id="tbanh">
	<tr>
		<th style="text-align: center;">id</th>
		<th>Tên ảnh</th>
		<th>Tên tour</th>
		<th>Hình ảnh</th>
		<th></th>
	</tr>
	@foreach($hinhanh as $ha)
	<tr>
		<td>{{$ha->id}}</td>
		<td>{{$ha->tenanh}}</td>
		<td>{{$ha->tentour}}</td>
		
		<td><img width="250px" height="250px" src="{{asset('images/place/' . $ha->url)}}"></td>
		<td>
			<a href="{{asset('admin/image/edit/' .$ha->id)}}">Sửa</a>
			&nbsp;&nbsp;
			<a href="{{asset('admin/image/delete/' .$ha->id)}}">Xóa</a>
		</td>
	</tr>
	@endforeach
</table>
{{$hinhanh->links()}}
@endsection