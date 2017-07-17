<div class="tintuc">
	<div class="tinmoinhat">
		<div class="category">Tin du lịch</div>
		<div class="content">
		@foreach($tintuc as $tt)
			@if($loop->first)
			<div class="title">
				<a href="{{asset('tour/tintuc/' . $tt->id)}}">{{$tt->tieude}}</a>
			</div>
			<div class="images">
				<img src="{{ asset('images/news/' . $tt->hinhanh) }}" width="270" height="200">
			</div>
			<div class="tomtat">{{$tt->tomtat}}</div>
				@break
			@endif
			@endforeach
		</div>
	</div>
	<div class="tinkhac">
		<ul>
			@foreach($tintuc as $tt)
			<li><a href="{{asset('tour/tintuc/' . $tt->id)}}">{{$tt->tieude}}</a></li>
			@endforeach
		</ul>
	</div>
</div>