@extends('layouts.index')
@section('pages')
@section('title',$title)
<div class="chitiettour">
<h1 style="font-size: 22px; color: #0f049a;">Du lịch {{$tour->tentour}}</h1>
<div class="content">
	<div class="images">
		<img src="{{asset('images/place/' . $tour->hinhanh)}}">
	</div>
	<div class="info">
		<div class="price">Giá: {{$tour->dongia}} VNĐ</div>
		<div> Thời gian: {{$tour->thoigian}}</div>
		<div>Khởi hành: {{$tour->ngaykhoihanh}}</div>
		<div>Lịch trình: {{$tour->lichtrinh}}</div>
		<div>Số chỗ còn nhận: {{$tour->soluong}}</div>
                    <a href="{{asset('tour/dattour/' . $tour->id)}}"><input type="submit" class="btnDattour" name="btnDattour" value="Đặt tour" /></a>
	</div>
</div>
<div style="clear: both;"></div>
<br>
<div id="myCarousel1" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="{{asset('images/place/' .$tour->hinhanh)}}" >
    </div>
     @foreach($hinh as $h)
    <div class="item">
      <img src="{{asset('images/place/' . $h->url)}}">
     <div class="carousel-caption">
       <p>{{$h->tenanh}}</p>
      </div>
    </div>
    @endforeach
    </div>
    <a class="left carousel-control" href="#myCarousel1" style="width:35px;" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel1" role="button" style="width: 35px;" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  </div>
  <br>
  <div class="category">Chi tiết tour</div>
  <ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#home">lịch trình</a></li>
  <li><a data-toggle="tab" href="#menu1">Khách sạn</a></li>
  <li><a data-toggle="tab" href="#menu2">lưu ý</a></li>
</ul>

<div class="tab-content">
  <div id="home" class="tab-pane fade in active">
    <h3>Chi tiết lịch trình</h3>
    <div class="details">{!! $tour->chitiet !!}</div>
  </div>
  <div id="menu1" class="tab-pane fade">
  <h3>Thông tin chi tiết khách sạn</h3>
    <table class="table table-bordered table-hover">
      <tr>
        <th>tên khách sạn</th>
        <th>chất lượng</th>
        <th>địa chỉ</th>
        <th>điện thoại</th>
      </tr>
      @foreach($khachsan as $kh)
      <tr>
        <td>{{$kh->tenkhs}}</td>
        <td><img src="{{asset('images/rate/' . $kh->chatluong . 'sao.png')}}">
       </td>
        <td>{{$kh->diachi}}</td>
        <td>{{$kh->dienthoai}}</td>
      </tr>
      @endforeach
    </table>
  </div>
  <div id="menu2" class="tab-pane fade">
    {!! $tour->ghichu !!}
  </div>
</div>

</div>
@include('layouts/binhluan')
@include('layouts/tourlienquan')
@endsection