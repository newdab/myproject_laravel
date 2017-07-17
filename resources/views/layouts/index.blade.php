<!DOCTYPE html>
<html lang="en">
<head>
	<title>Du lich @yield('title')</title>
  <meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="{{elixir('css/bootstrap.css')}}">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
  <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.min.js')}}"></script>
  <script type="text/javascript" src="{{elixir('ckeditor/ckeditor.js')}}"></script>
	<script src="{{elixir('js/bootstrap.min.js')}}"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
  <style>
 #myCarousel{
  float: left;
  width: 100%;
 }
.carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
    width: 100%;
      height: 300px;
  }
.login{
    float: left;
    width: 273px; height: 300px;
    /*background-color: #dddddd;*/
    padding: 10px;
    margin-left: 15px;
    background-image: url('images/login.jpg');
    background-size: 100%;
}
.login .info input{
    width: 90%;
    border-radius: 5px;
}
.login .info{
    margin-bottom: 10px;
    line-height: 25px;
}
.login #btnLogin{
    line-height: 30px;
    width: 100px;
    margin-left: 40px;
}
  </style>

</head>
 
<body>
<script type="text/javascript">
    $(document).ready(function(){
        $("#loaiTour").click(function(){
            var idloaitour=$("#loaiTour").val();
            $.get('tour/ajax/loaiTour/'+idloaitour,function(data){
                $("#diadiem").html(data);
            });
        });
    });
</script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.9";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div  class="wrapper">
@include('layouts/banner')
@include('layouts/menu')
@include('layouts/slider')
<div class="main">
  @section('pages')
  @show
</div>
<div class="right">
	<div class="search_box">
		@include('layouts/search')
	</div>
	@include('layouts/tintuc')
  @include('layouts/thoitiet')
</div>
</div>
</body>
</html>