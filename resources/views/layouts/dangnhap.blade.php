@extends('layouts.index')
@section('pages')
<div class="dangky">
	<div class="category">đăng nhập thành viên</div>
	<div class="content">
	<form method="post" action="{{route('login')}}">
  <input type="hidden" name="_token" value="{{csrf_token()}}">
  <table style="background-color: #ADD8E6; width: 100%; height: 200px;
		">
    <tr><td></td><td>
    <span style="color: red;"> {{session('thongbao')}}</span>
   </td></tr>
  	<tr>
  		<td style="text-align: right;">Email:&nbsp;&nbsp;&nbsp;&nbsp;</td>
  		<td><input type="email" placeholder="email" style="width: 50%" required name="email"></td>
  	</tr>
  	<tr>
  		<td style="text-align: right;">Mật khẩu:&nbsp;&nbsp;&nbsp;&nbsp;</</td>
  		<td><input type="password" placeholder="password"  style="width: 50%" name="password"></td>
  	</tr>

  	<tr>
  		<td ></td>
  		<td><input type="submit" name="" value="đăng nhập"></td>
  	</tr>
  </table>

  </form>
	</div>
</div>
@endsection