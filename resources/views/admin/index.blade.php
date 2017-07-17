<!DOCTYPE html>
<html>
<head>
	<title>Admin @yield('title')</title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}">
  <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('ckeditor/ckeditor.js')}}"></script>
  <script src="{{asset('js/bootstrap.js')}}"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
</head>
<body>
@section('menu')
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="">Quản lý web du lịch</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="{{asset('admin/tour')}}">Home</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="{{asset('admin/tour')}}">Quản lý tour  <span class="caret"></span> </a>
          <ul class="dropdown-menu">
          <li><a href="{{asset('admin/tour')}}">Tour</a></li>
          <li><a href="{{asset('admin/image')}}">Image- tour</a></li>
           <li><a href="{{asset('admin/khachsan-tour')}}">Khách sạn - tour</a></li>
          </ul>
        </li>
        <li>
          <a href="{{asset('admin/dattour')}}">Quản lý đặt tour</a>
        </li>
        <li><a href="{{asset('admin/khachsan')}}">Quản lý khách sạn</a></li>
        <li><a href="{{asset('admin/khachhang')}}">Quản lý khách hàng</a></li>
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="{{asset('admin/tintuc')}}">Quản lý tin tức<span class="caret"></span></a>
          
          <ul class="dropdown-menu">
          <li><a href="{{asset('admin/tintuc')}}">Tin tức</a></li>
          <li><a href="{{asset('admin/diadiem')}}">Địa điểm</a></li>

          </ul>
        </li>
        <li><a href="{{asset('admin/user')}}">Quản lý user</a></li>
      </ul>
    @if(Session::has('name'))
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span>{{Session::get('name')}} </a></li>
      <li><a href="{{asset('tour/logout')}}"><span class="glyphicon glyphicon-log-in"></span>đăng xuất </a></li>
    </ul>
@endif
    </div>
  </div>
</nav>
@show
<div class="container">
	@yield('content')
</div>
</body>
</html>