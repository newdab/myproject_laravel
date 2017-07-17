@extends('admin.index')
@section('title','khách hàng')
@section('content')
<h2 style="text-align: center;">
	Quản lý khách sạn -tour
	<small style="float: right; padding-right: 30px;"><a href="{{asset('admin/khachsan-tour/add')}}"><img src="{{asset('images/button-add-icon.png')}}" alt=""></a></small>
</h2>
<form method="get" action="{{asset('admin/khachsan-tour/sort')}}" >
<select name="matour" id="matour">
	<option value="">-- tên tour --</option>
	@foreach($tour as $tour)
	<option value="{{$tour->id}}">{{$tour->tentour}}</option>
	@endforeach
</select>
<input type="submit" name="" value="Lọc">
</form>
<table class="table table-bordered table-hover">
	<tr>
	<th>tour</th>
	<th>khách sạn</th>
	<th>Chi tiết</th>
	<th></th>
	</tr>
	@foreach($kt as $k)
		<tr>
			<td>{{$k->tentour}}</td>
			<td>{{$k->tenkhs}}</td>
			<td>{{$k->chitiet}}</td>
			<td>
				<a href="{{asset('admin/khachsan-tour/edit/' .$k->matour.'/' .$k->makhs)}}">Sửa</a>&nbsp;
				<a href="{{asset('admin/khachsan-tour/delete/'.$k->matour.'/'.$k->makhs)}}">Xóa</a>
			</td>
		</tr>
	@endforeach
</table>
{{$kt->links()}}
@endsection