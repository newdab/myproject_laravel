@extends('layouts.index')
@section('pages')
<div class="kqtimTour">
<div class="category">Kết quả tìm tiếm</div>
<div class="content">
@foreach($tours as $vn)
<div class="box">
		<div class="f1">
			<img src="{{asset('images/place/' . $vn->hinhanh)}}">
		</div>
		<div class="f2">
			<div class="tour_name">
				<a href="{{asset('tour/chitiet/' .$vn->id)}}">{{$vn->tentour}}</a>
			</div>
			<div class="price">Giá: {{$vn->dongia}} VND</div>
			<div class="time">Thời gian: {{$vn->thoigian}}</div>
			<div>Khởi hành: {{$vn->diemkhoihanh}}</div>
		</div>
		<div class="f3">Lịch trình: {{$vn->lichtrinh}}
		</div>
		<div  class="f4">
			<a href="{{asset('tour/chitiet/' . $vn->id)}}">
				<input type="button" name="" value="Chi tiết">
			</a>
			<a href="{{asset('tour/dattour/' . $vn->id)}}"><input type="button" value="Đặt tour" name=""></a>
		</div>
	</div>
@endforeach
</div>
</div>
@endsection