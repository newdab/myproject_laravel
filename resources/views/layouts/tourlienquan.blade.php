<div class="tourlienquan">
	<div class="category">Tour liên quan</div>
	<div class="content">
		@foreach($tourlq as $tour)
			<div class="box">
		<div class="f1">
			<img src="{{asset('images/place/' . $tour->hinhanh)}}">
		</div>
		<div class="f2">
			<div class="tour_name">
				<a href="{{asset('tour/chitiet/' . $tour->id)}}">{{$tour->tentour}}</a>
			</div>
			<div class="price">Giá: {{$tour->dongia}} VND</div>
			<div class="time">Thời gian: {{$tour->thoigian}}</div>
			<div>Khởi hành: {{$tour->diemkhoihanh}}</div>
		</div>
		<div class="f3">Lịch trình: {{$tour->lichtrinh}}
		</div>
	</div>
		@endforeach
	</div>
</div>