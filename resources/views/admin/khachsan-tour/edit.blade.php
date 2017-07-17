@extends('admin.index')
@section('title','edit khách sạn- tour')
@section('content')
<h2 style="text-align: center;">Thông tin Khách sạn- Tour</h2>
<form method="POST" action="{{asset('admin/khachsan-tour/edit/'.$kt->matour.'/'.$kt->makhs)}}" class="col-md-9 col-xs-offset-2" enctype="multipart/form-data">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<table class="table table-bordered">
		<tr>
			<td>
				tour
			</td>
			<td>
				<select name="matour">
				<option value="{{$kt->matour}}">{{$kt->tentour}}</option>
				@foreach($tour as $tour)
					<option value="{{$tour->id}}">{{$tour->tentour}}</option>
				@endforeach
				</select>
			</td>
		</tr>
		<tr>
			<td>khách sạn</td>
			<td>
				<select name="makhs">
				<option value="{{$kt->makhs}}">{{$kt->tenkhs}}</option>
					@foreach($khachsan as $kh)
					<option value="{{$kh->id}}">{{$kh->tenkhs}}</option>
					@endforeach
				</select>
			</td>
		</tr>
		<tr>
		<td>chi tiết</td>
		<td>
			<textarea name="chitiet" rows="4" cols="100">{{$kt->chitiet}}</textarea>
		</td>
	</tr>
	<tr>
		<td colspan="2" style="text-align: center;">
				<button type="submit" name="" style="width: 85px; height: 80px; background-color: transparent; background-image: url('../../../../images/process-icon-button.png'); background-repeat: no-repeat; border-width: 0px;" value=""></button> 
				<a href="{{asset('admin/image')}}"> 
				<input type="button" name="" style="width: 85px; height: 80px; background-color: transparent; background-image: url('../../../../images/cancel-icon-button.png'); background-repeat: no-repeat; border-width: 0px;" value="" /></a>
		</td>
		</tr>
	</table>
	
</form>
@endsection