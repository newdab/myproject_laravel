@extends('admin.index')
@section('title','edit images')
@section('content')
<h2 style="text-align: center;">Thông tin image</h2>
<form method="POST" action="{{asset('admin/image/edit/' . $hinhanh->id)}}" class="col-md-9 col-xs-offset-2" enctype="multipart/form-data">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<table class="table table-bordered">
		<tr>
		<td>Tên tour</td>
		<td>
		<select name="matour">
		<option value="{{$hinhanh->matour}}">{{$hinhanh->tentour}}</option>
		@foreach($tour as $tour)
			<option value="{{$tour->id}}">{{$tour->tentour}}</option>
		@endforeach
		</select></td>
		</tr>
		<tr>
			<td>Tên ảnh</td>
			<td><input type="text" name="tenanh" value="{{$hinhanh->tenanh}}"> </td>
		</tr>
		<tr>
			<td>Hình ảnh</td>
			<td>
			<img width="200px" height="200px" src="{{asset('images/place/' .$hinhanh->url)}}"><input type="file" name="hinhanh" required=""  accept="image/*"></td>
		</tr>
		<tr>
			<td colspan="2" style="text-align: center;">
				<button type="submit" name="" style="width: 85px; height: 80px; background-color: transparent; background-image: url('../../../images/process-icon-button.png'); background-repeat: no-repeat; border-width: 0px;" value=""></button> 
				<a href="{{asset('admin/image')}}"> 
				<input type="button" name="" style="width: 85px; height: 80px; background-color: transparent; background-image: url('../../../images/cancel-icon-button.png'); background-repeat: no-repeat; border-width: 0px;" value="" /></a>
			</td>
		</tr>
	</table>
</form>
@endsection