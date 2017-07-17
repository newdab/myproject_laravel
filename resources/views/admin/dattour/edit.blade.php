@extends('admin.index')
@section('title','edit dat tour')
@section('content')
<h2 style="text-align: center;">Thông tin đăt tour</h2>
<form method="POST" action="{{asset('admin/dattour/edit/' . $dd->id)}}" class="col-md-9 col-xs-offset-2" enctype="multipart/form-data">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<table class="table table-bordered">
		<tr>
		<td>
			tour
		</td>
		<td>
			<select name="matour">
			<option value="{{$dd->matour}}">
				{{$dd->tentour}}
			</option>
				@foreach($tour as $tour)
				<option value="{{$tour->id}}">{{$tour->tentour}}</option>
				@endforeach
			</select>
		</td>
		</tr>
		<tr><td>Khách</td>
		<td>
			<select name="makhach">
			<option value="{{$dd->makhach}}">{{$dd->tenkhach}}</option>
				@foreach($khach as $khach)
				<option value="{{$khach->id}}">{{$khach->tenkhach}}(&nbspemail:&nbsp{{$khach->email}},&nbsp phone:&nbsp{{$khach->dienthoai}})</option>
				@endforeach
			</select>
		</td>
		</tr>
		<tr>
			<td>Ngày đăt</td>
			<td>
				<input type="text" readonly name="ngaydat" value="{{$dd->ngaydat}}">
			</td>
		</tr>
		<tr>
			<td>Số người</td>
			<td><input type="number" min="1" max="{{$tour->soluong}}" name="songuoi" id="songuoi" onchange="update()" value="{{$dd->songuoi}}"></td>
		</tr>
		<tr>
			<td>Đơn giá</td>
			<td><input type="number" name="dongia" id="dongia" readonly onchange="update()" value="{{$dd->dongia}}"></td>
		</tr>
		<tr>
			<td>Giảm giá</td>
			<td><input type="number" min="0" max="99" name="giamgia" id="giamgia" onchange="update()" value="{{$dd->giamgia}}"></td>
		</tr>
		<tr>
			<td>Thành tiền</td>
			<td><input type="text" name="thanhtien" id="thanhtien" readonly value="{{$dd->thanhtien}}"></td>
		</tr>
		<script type="text/javascript">
			function update(){
				 var gia=document.getElementById("dongia").value;
				 var soluong=document.getElementById("songuoi").value;
				 var giamgia=document.getElementById("giamgia").value;
				 var thanhtien=soluong*gia*(100-giamgia)/100;
				 document.getElementById("thanhtien").value=thanhtien;
			}
		</script>
		<tr>
			<td>Trẻ nhỏ</td>
			<td><input type="number" name="trenho" value="{{$dd->trenho}}"></td>
		</tr>
		
		<tr>
			<td>Yêu cầu</td>
			<td><textarea style="width: 100%" name="yeucau" >
				{{$dd->yeucau}}
			</textarea></td>
		</tr>
		<tr>
			<td>Trạng thái</td>
			<td>
			@if($dd->trangthai ==0)
			<input type="radio" checked name="trangthai" 
			  value="0">Chưa duyệt
			<input type="radio" name="trangthai" value="1">đã duyệt
			@else
			<input type="radio" name="trangthai" 
			  value="0">Chưa duyệt
			<input type="radio" checked name="trangthai" value="1">đã duyệt
			@endif
			</td>
		</tr>
		<tr>
		<td>Ghi chú</td>
		<td><textarea style="width: 100%" name="ghichu">{{$dd->ghichu}}</textarea></td>
		</tr>
		<tr>
			<td colspan="2" style="text-align: center;">
				<button type="submit" name="" style="width: 85px; height: 80px; background-color: transparent; background-image: url('../../../images/process-icon-button.png'); background-repeat: no-repeat; border-width: 0px;" value=""></button> 
				<a href="{{asset('admin/tour')}}"> 
				<input type="button" name="" style="width: 85px; height: 80px; background-color: transparent; background-image: url('../../../images/cancel-icon-button.png'); background-repeat: no-repeat; border-width: 0px;" value="" /></a>
			</td>
		</tr>
	</table>
</form>
@endsection