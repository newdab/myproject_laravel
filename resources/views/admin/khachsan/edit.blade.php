@extends('admin.index')
@section('title','edit khach san')
@section('content')
<h2 style="text-align: center;">Thông tin Khách sạn</h2>
<form method="POST" action="{{asset('admin/khachsan/edit/' .$kk->id)}}" class="col-md-9 col-xs-offset-2" enctype="multipart/form-data">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<table class="table table-bordered">
	<tr>
		<td class="col-md-2">Tên khách sạn</td>
		<td><input type="text" value="{{$kk->tenkhs}}" name="tenkhs" required></td>
	</tr>
	<tr>
		<td>chất lượng</td>
		<td><input type="text" name="chatluong" value="{{$kk->chatluong}}" required></td>
	</tr>
	<tr>
		<td>địa chỉ</td>
		<td><textarea style="width: 100%" name="diachi">{{$kk->diachi}}</textarea></td>
	</tr>
	<tr>
		<td>ghi chú</td>
		<td><textarea style="width: 100%" name="ghichu">{{$kk->ghichu}}</textarea></td>
	</tr>
	<tr>
			<td colspan="2" style="text-align: center;">
				<button type="submit" name="" style="width: 85px; height: 80px; background-color: transparent; background-image: url('../../../images/process-icon-button.png'); background-repeat: no-repeat; border-width: 0px;" value=""></button>  
				<a href="{{asset('admin/khachsan')}}"><input type="button" name="" style="width: 85px; height: 80px; background-color: transparent; background-image: url('../../../images/cancel-icon-button.png'); background-repeat: no-repeat; border-width: 0px;" value="" /></a>
			</td>
		</tr>
</table>
@endsection