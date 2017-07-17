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
		<div  class="f4">
			<a href="{{asset('tour/chitiet/' . $tour->id)}}">
				<input type="button" name="" value="Chi tiết">
			</a>
			<a href="{{asset('tour/dattour/' . $tour->id)}}"><input type="button" value="Đặt tour" name=""></a>
		</div>
	</div>