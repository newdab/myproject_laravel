@extends('layouts.index')
@section('pages')
<div class="tournuocngoai">
	<div class="category">Du lịch nước ngoài</div>
	<div class="content">
		@foreach($tours as $tour)
		@include('layouts/tour')
		@endforeach
	</div>
	{{ $tours->links() }}
</div>
@endsection