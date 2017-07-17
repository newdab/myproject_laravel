@extends('admin.index')
@section('title','tin tức')
@section('content')
<h2 style="text-align: center;">
	Quản lý tin tức
	<small style="float: right; padding-right: 30px;"><a href="{{asset('admin/tintuc/add')}}"><img src="{{asset('images/button-add-icon.png')}}" alt=""></a></small>
</h2>
<table class="table table-bordered table-hover">
	<tr>
		<th style="text-align: center;">id</th>
		<th>Tiêu đề </th>
		<th>ngày đăng</th>
		<th>tóm tắt</th>
		<th>hình ảnh</th>
		<th></th>
	</tr>
	@foreach($tintuc as $tt)
	 <tr>
	 	<td>{{$tt->id}}</td>
	 	<td>{{$tt->tieude}}</td>
	 	<td>{{$tt->ngaydang}}</td>
	 	<td>{{$tt->tomtat}}</td>
	 	<td>{{$tt->hinhanh}}</td>
	 	<td class="col-md-1" style="text-align: center;">
	 		<a href="{{asset('admin/tintuc/edit/' . $tt->id)}}">Sửa</a>&nbsp;
	 		<a href="{{asset('admin/tintuc/delete/' . $tt->id)}}">Xóa</a>
	 	</td>
	 </tr>
	 @endforeach
</table>
{{$tintuc->links()}}
@endsection