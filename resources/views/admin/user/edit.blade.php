@extends('admin.index')
@section('title','edit user')
@section('content')
<h2 style="text-align: center;">Thông tin tour</h2>
<form method="POST" action="" class="col-md-9 col-xs-offset-2" enctype="multipart/form-data">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<table class="table table-bordered">
		<tr>
			<td>Email</td>
			<td><input type="email" required name="email" disabled value="{{$user->email}}"></td>
		</tr>
		<tr><td>Họ tên</td>
			<td><input type="text" name="name" value="{{$user->name}}"  required></td>
		</tr>
		<tr>
			<td>Quyền</td>
			<td><select name="quyen">
					<option value="0">khách</option>
					<option value="1">admin</option>
				</select>
			</td>
		</tr>
		<tr>
			<td></td>
			<td>
				<span id="message"></span></td>
		</tr>
		<tr>
			<td colspan="2" style="text-align: center;">
				<button type="submit" id="dangky" style="width: 85px; height: 80px; background-color: transparent; background-image: url('../../../images/process-icon-button.png'); background-repeat: no-repeat; border-width: 0px;" value=""></button>  
				<a href="{{asset('admin/tour')}}"><input type="button" name="" style="width: 85px; height: 80px; background-color: transparent; background-image: url('../../../images/cancel-icon-button.png'); background-repeat: no-repeat; border-width: 0px;" value="" /></a>
			</td>
		</tr>
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
	</table>
</form>
@endsection