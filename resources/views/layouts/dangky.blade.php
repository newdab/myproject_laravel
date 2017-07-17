@extends('layouts.index')
@section('pages')
<div class="dangky">
	<div class="category">ĐĂNG KÝ THÀNH VIÊN</div>
	<div class="content">
	<form method="post" action="{{route('register')}}">
	<input type="hidden" name="_token" value="{{csrf_token()}}">
		<table style="background-color: #ADD8E6; width: 100%; height: 300px;
		">
		<tr>
			<td style="text-align: center;">Email</td>
			<td width="86%"><input required style="width: 70%" type="email" name="email"></td>
		</tr>
		<tr>
			<td style="text-align: center;">Họ và tên</td>
			<td><input type="text" required style="width: 70%" name="ten"></td>
		</tr>
		<tr>
			<td style="text-align: center;">mật khẩu</td>
			<td><input required minlength="4" type="password" style="width: 70%" id="password" name="password"></td>
		</tr>
		<tr>
			<td style="text-align: center;">nhập lại mật khẩu</td>
			<td><input type="password" style="width: 70%" id="confirm_password" name="confirm_password" onkeyup="check()"></td>
		</tr>
		<tr>
		<td></td>
		<td>
			<span id="message" style="color: red;">{{session('thongbao')}}</span>
		</td></tr>
		<tr>
		<td></td>
			<td><input type="submit" name="" id="dangky" value="Đăng ký"></td>
		</tr>
		</table>
		<script type="text/javascript">
			function check() {
			if (document.getElementById('password').value == document.getElementById('confirm_password').value) {
				if(document.getElementById('dangky').disabled==true)
  					document.getElementById('dangky').disabled=false;
				 	document.getElementById('message').style.color = 'green';
   					document.getElementById('message').innerHTML = '';
  			} else {
  				if(document.getElementById('dangky').disabled==false)
  					document.getElementById('dangky').disabled=true;
    			document.getElementById('message').style.color = 'red';
    			document.getElementById('message').innerHTML = 'mat khau không khớp';
  					}
			}
		</script>
	</div>
	</form>
</div>
@endsection