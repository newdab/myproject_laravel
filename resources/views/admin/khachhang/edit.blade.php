@extends('admin.index')
@section('title','add khách hàng')
@section('content')
<h2 style="text-align: center;">Thông tin khách hàng</h2>
<form method="POST" action="{{asset('admin/khachhang/edit/' . $khach->id)}}" class="col-md-9 col-xs-offset-2" enctype="multipart/form-data">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<table class="table table-bordered">
		<tr>
			<td>Tên khách</td>
			<td><input type="text" name="tenkhach" value="{{$khach->tenkhach}}"></td>
		</tr>
		<tr>
			<td>Địa chỉ</td>
			<td><textarea name="diachi" style="width: 100%">
				{{$khach->diachi}}
			</textarea></td>
		</tr>
		<tr>
			<td>Điện thoại</td>
			<td><input type="phone" value="{{$khach->dienthoai}}" name="dienthoai"></td>
		</tr>
		<tr>
			<td>Email</td>
			<td>
				<input type="email" value="
				{{$khach->email}}" name="email">
			</td>
		</tr>
		<tr>
			<td colspan="2" style="text-align: center;">
				<button type="submit" name="" style="width: 85px; height: 80px; background-color: transparent; background-image: url('../../../images/process-icon-button.png'); background-repeat: no-repeat; border-width: 0px;" value=""></button> 
				<a href="{{asset('admin/khachhang')}}"> 
				<input type="button" name="" style="width: 85px; height: 80px; background-color: transparent; background-image: url('../../../images/cancel-icon-button.png'); background-repeat: no-repeat; border-width: 0px;" value="" /></a>
			</td>
		</tr>
	</table>
</form>
@endsection