<div class="banner">
	<div class="info" style=" float: right; height: 20px; margin-top: 0px" >
	@if(Session::has('name'))
		<span class="glyphicon glyphicon-user">
		</span>
		<a href="{{asset('tour/lsdattour')}}"  style="font-style: 17px; color: black;">{{Session::get('name')}}</a>
		<a href="{{asset('tour/logout')}}">đăng xuất</a>

	@else
	<ul class="nav navbar-nav navbar-right" style="height:20px; margin-right: 0px; margin-top: 0px">
 
    
	<li><a href="{{asset('tour/login')}}" style="height:40px; color: black;"><span class="glyphicon glyphicon-log-in"></span>&nbsp;Đăng nhập</a>
	</li>
 	<li><a style="height:40px; color: black;" href="{{asset('tour/dangky')}}"><span class="glyphicon glyphicon-user"></span>&nbsp;Đăng ký</a></li>
 	</ul>
	@endif
	</div>
	<div class="hotro" style="float: right; margin-top: 10px">

	    Hỗ trợ trực tuyến:
	    <ul>
	        <li>TP.HCM: <b>(+84 8) 1221 1221</b></li>
	        <li>Hà Nội: <b>(+84 4) 3113 3113</b></li>
	    </ul>
	</div>
</div>