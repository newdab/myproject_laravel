@extends('layouts.index')
@section('pages')
<div class="tintucsukien">
	<div class="tindulich">
		<div class="category">Tin du lịch</div>
		@foreach($tintuc as $news)
		<div class="news">
		<div class="images">
		<img src="{{ asset('images/news/' . $news->hinhanh) }}" >
		</div>
			<div class="details">
				<div class="title">
					<a href="{{asset('tour/tintuc/' . $news->id)}}">{{$news->tieude}}</a>
				</div>
				<div class="tomtat">{{$news->tomtat}}</div>
				<div class="continue">
					<a href="{{asset('tour/tintuc/' . $news->id)}}">Đọc tiếp &gt;&gt;</a>
				</div>
			</div>
		</div>
		@endforeach
	</div>
	
</div>
</div>
@endsection