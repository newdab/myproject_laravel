@extends('layouts.index')
@section('pages')
<div class="DLhot">
<div class="category">Du lịch hot</div>
	<div class="content">
	@foreach($tours as $hot)
	@if($hot->tourhot==1)
		<div class="box">
			<div class="images">
				<img src="{{asset('images/place/' . $hot->hinhanh)}}">
			</div>
			<div class="tour_name">
				<a href="{{asset('tour/chitiet/' . $hot->id)}}">{{$hot->tentour}}</a>
			</div>
		</div>
		@endif
		@endforeach
	</div>
</div>
<div class="content">
<div class="main_left">
	<div class="category" style="background-color: green;">Du lịch trong nước</div>
	@foreach($tours as $tour)
	@if($tour->trongnuoc==1)
	@include('layouts/tour')
	@endif
	@endforeach
</div>
</div>
<div class="content">
<div class="main_right">
	<div class="category">Du lịch ngoài nước</div>
	@foreach($tours as $tour)
	@if($tour->trongnuoc == 0)
	@include('layouts/tour')
	@endif
	@endforeach
</div>
</div>
@endsection