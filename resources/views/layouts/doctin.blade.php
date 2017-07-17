@extends('layouts.index')
@section('pages')
<div class="doctin">
	<div class="title">
		{{$new->tieude}}
	</div>
	<div class="date">
		{{$new->ngaydang}}
	</div>
	<div class="content">
		{!! $new->chitiet !!}
	</div>
	<h4 style="float: right;">{{$new->tacgia}}</h4>
</div>
@endsection