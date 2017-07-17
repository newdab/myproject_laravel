@extends('admin.index')
@section('title','user')
@section('content')
<h2 style="text-align: center;">
	Quản lý User
	<small style="float: right; padding-right: 30px;"><a href="{{asset('admin/user/add')}}"><img src="../images/button-add-icon.png" alt=""></a></small>
</h2>
<table class="table table-bordered table-hover">
	<tr>
		<th style="text-align: center;">id</th>
		<th>Name</th>
		<th>Email </th>
		<th>Quyền</th>
		<th></th>
	</tr>
	@foreach($users as $user)
	 <tr>
	 	<td>{{$user->id}}</td>
	 	<td>{{$user->name}}</td>
	 	<td>{{$user->email}}</td>
	 	<td>
	 		@if($user->quyen==1)
	 			admin
	 		@else
	 			khách
	 		@endif
	 	</td>
	 	<td class="col-md-1" style="text-align: center;">
	 		<a href="{{asset('admin/user/edit/' . $user->id)}}">Sửa</a>&nbsp;
	 		<a href="{{asset('admin/user/delete/' . $user->id)}}">Xóa</a>
	 	</td>
	 </tr>
	 @endforeach
</table>
{{$users->links()}}
@endsection