@extends('layouts.index')
@section('pages')
<div class="tourtrongnuoc">
	<div class="category">Du lịch trong nước</div>
	<div class="content">
		@foreach($tours as $tour)
		@include('layouts/tour')
		@endforeach
	</div>
	{{ $tours->links() }}
</div>
@endsection