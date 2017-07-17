@extends('admin.index')
@section('title','add địa điểm')
@section('content')
<h2 style="text-align: center;">Thông tin địa điểm</h2>
<form method="POST" action="{{asset('admin/diadiem/edit/' .$dd->id)}}" class="col-md-9 col-xs-offset-2" enctype="multipart/form-data">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<table class="table table-bordered">
		<tr>
		<td>Tên địa điểm</td>
		<td>
			<input type="text" required name="tendiadiem" value="{{$dd->tendiadiem}}">
		</td>
		</tr>
		<tr>
				<td>Hình ảnh</td>
				<td><input type="file" name="hinhanh"  required>
				<img src="{{asset('images/gioithieu/' .$dd->hinhanh)}}" width="100px" height="100px"></td>
		</tr>
		<tr>
			<td>Mô tả</td>
			<td>
				<textarea name="mota" rows="4" cols="50" id="mota"  required>{{$dd->mota}}</textarea>
				<script language="javascript">CKEDITOR.replace('mota');</script>
			</td>
		</tr>
		<tr>
			<td>Trong nước</td>
			<td>
				<input type="checkbox" name="trongnuoc" @if($dd->trongnuoc==1) checked @endif>
			</td>
		</tr>
		<tr>
			<td colspan="2" style="text-align: center;">
				<button type="submit" name="" style="width: 85px; height: 80px; background-color: transparent; background-image: url('../../../images/process-icon-button.png'); background-repeat: no-repeat; border-width: 0px;" value=""></button> 
				<a href="{{asset('admin/diadiem')}}"> 
				<input type="button" name="" style="width: 85px; height: 80px; background-color: transparent; background-image: url('../../../images/cancel-icon-button.png'); background-repeat: no-repeat; border-width: 0px;" value="" /></a>
			</td>
		</tr>
	</table>
</form>
@endsection
