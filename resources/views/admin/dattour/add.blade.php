@extends('admin.index')
@section('title','add dat tour')
@section('content')
<h2 style="text-align: center;">Thông tin đặt tour</h2>
<form method="POST" action="{{asset('admin/dattour/add')}}" class="col-md-9 col-xs-offset-2" enctype="multipart/form-data">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<table class="table table-bordered">
		<tr>
		<td>
			tour
		</td>
		<td>
			<select name="matour">
				@foreach($tour as $tour)
				<option value="{{$tour->id}}">{{$tour->tentour}}</option>
				@endforeach
			</select>
		</td>
		</tr>
		<tr><td>Khách</td>
		<td>
			<select name="makhach">
				@foreach($khach as $khach)
				<option value="{{$khach->id}}">{{$khach->tenkhach}}(&nbspemail:&nbsp{{$khach->email}},&nbsp phone:&nbsp{{$khach->dienthoai}})</option>
				@endforeach
			</select>
		</td>
		</tr>
		<tr>
			<td>Số người</td>
			<td><input type="number"  min="1" name="songuoi"></td>
		</tr>
		<tr>
			<td>Trẻ nhỏ</td>
			<td><input type="number" min="0" name="trenho"></td>
		</tr>

		<tr>
			<td>Yêu cầu</td>
			<td><textarea style="width: 100%" name="yeucau" ></textarea></td>
		</tr>
		<tr>
			<td>Trạng thái</td>
			<td><input type="radio" name="trangthai" checked value="0">Chưa duyệt
			<input type="radio" name="trangthai" value="1">đã duyệt</td>
		</tr>
		<tr>
		<td>Ghi chú</td>
		<td><textarea style="width: 100%" name="ghichu"></textarea></td>
		</tr>
		<tr>
			<td colspan="2" style="text-align: center;">
				<button type="submit" name="" style="width: 85px; height: 80px; background-color: transparent; background-image: url('../../images/process-icon-button.png'); background-repeat: no-repeat; border-width: 0px;" value=""></button> 
				<a href="{{asset('admin/tour')}}"> 
				<input type="button" name="" style="width: 85px; height: 80px; background-color: transparent; background-image: url('../../images/cancel-icon-button.png'); background-repeat: no-repeat; border-width: 0px;" value="" /></a>
			</td>
		</tr>
	</table>
</form>
@endsection