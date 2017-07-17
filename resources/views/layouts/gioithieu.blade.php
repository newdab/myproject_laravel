@extends('layouts.index')
@section('pages')
<div class="gioithieu">
	<h1 style="text-align: center;font-size: 23px;color:red;">GIỚI THIỆU DANH LAM THẮNG CẢNH VIỆT NAM</h1>
	@foreach($diadiem as $diadiem)
	<div style="font-size: 15px;"><a href="{{asset('tour/diadiem/'. $diadiem->tendiadiem)}}" style="font-weight: bold;">{{$loop->index +1}}.&nbsp;{{$diadiem->tendiadiem}}</a>
		<br>
		<br>
		<img width="400px" height="400px" style="margin-left:10px; margin-right: 10px" src="{{asset('images/gioithieu/' . $diadiem->hinhanh)}}">
		<br>
		<br>
		{!! $diadiem->mota  !!}
	</div>
	@endforeach
</div>

@endsection