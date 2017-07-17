@extends('admin.index')
@section('title','add khach san')
@section('content')
<h2 style="text-align: center;">Thông tin tin tức</h2>
<form method="POST" action="{{asset('admin/tintuc/add')}}" class="col-md-9 col-xs-offset-2" enctype="multipart/form-data">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<table class="table table-bordered">
	<tr>
		<td>Tiêu đề</td>
		<td>
			<input type="text" required name="tieude">
		</td>
	</tr>
	<tr>
		<td>Tóm tắt</td>
		<td><textarea name="tomtat" required style="width: 100%"></textarea></td>
	</tr>
	<tr>
		<td>Chi tiết</td>
		<td>
			<textarea name="chitiet" id="chitiet" required style="width: 100%;"></textarea>
				<script language="javascript">CKEDITOR.replace('chitiet');</script>
		</td>
	</tr>
	<tr>
		<td>Hình ảnh</td>
			<td>
				<input type="file" required accept="image/*" name="hinhanh" >
			</td>
	</tr>
	<tr>
		<td>Tác giả</td>
		<td><input type="text" required name="tacgia"></td>
	</tr>
	<tr>
		<td colspan="2" style="text-align: center;">
				<button type="submit" name="" style="width: 85px; height: 80px; background-color: transparent; background-image: url('../../images/process-icon-button.png'); background-repeat: no-repeat; border-width: 0px;" value=""></button>  
				<a href="{{asset('admin/tour')}}"><input type="button" name="" style="width: 85px; height: 80px; background-color: transparent; background-image: url('../../images/cancel-icon-button.png'); background-repeat: no-repeat; border-width: 0px;" value="" /></a>
			</td>
	</tr>
</table>
</form>
@endsection