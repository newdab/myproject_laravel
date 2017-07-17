<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Session;
use App\User;
use App\Tintuc;

class UserController extends Controller
{
	function __construct(){
		 $diadiem1=DB::table('diadiem')->get();
         view()->share('diadiem1',$diadiem1);
		 $tintuc=DB::table('tintuc')->paginate(5);
		 view()->share('tintuc',$tintuc);
	}
	public function viewUser(){
		$users=DB::table('users')->paginate(5);
		return view('admin/user/user',['users'=>$users]);
	}
	public function postRegister(Request $request){
		$count=DB::table('users')->where([['email',$request->email],])->count();
		if ($count==0) {
			$User=new User();
			$User->email=$request->email;
			$User->name=$request->ten;
			$User->password=bcrypt($request->password);
			$User->quyen=0;
			$User->save();
			$user=DB::table('users')->where('email',$request->email)->first();
			Session::put('iduser',$user->id);
			Session::put('name',$user->name);
			return redirect('tour');
		}
		else{
			return redirect('tour/dangky')->with('thongbao','email đã tồn tại');
		}
	}
	public function postLogin(Request $request){
		/*
		$count=DB::table('users')->where([['email',$request->email],['password',$request->password],])->count();
		if ($count==1) {
			$user=DB::table('users')->where('email',$request->email)->first();
			Session::put('iduser',$user->id);
			Session::put('name',$user->name);
			if($user->quyen==0)
			return redirect('tour');
			else 
				return redirect('admin/tour');
		}
		else{
			flash('Welcome Aboard!');
			return redirect('tour');
		}*/
		if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
			$user=DB::table('users')->where('email',$request->email)->first();
			Session::put('iduser',$user->id);
			Session::put('name',$user->name);
			return redirect('admin/tour');
		}
		else{
			return redirect('tour/login')->with('thongbao','Invalid emaill or password. ');
		}
	}
	public function viewAdd(Request $request){
		return view('admin/user/add');
	}
	public function postAdd(Request $request){
		$checkmail=DB::table('users')->where([['email',$request->email],])->count();
		if($checkmail==0){
			$user=new User;
		$user->email=$request->email;
		$user->name=$request->name;
		$user->password=bcrypt($request->password);
		$user->quyen=$request->quyen;
		$user->save();
		return redirect('admin/user');
		}
		else{
			return redirect('admin/user/add')->with('thongbao','email đã được sử dụng');
		}
		
	}
	public function viewEdit($id){
		$user=User::find($id);
		return view('admin/user/edit',['user'=>$user]);
	}
	public function postEdit(Request $request,$id){
		$user=User::find($id);
		$user->name=$request->name;
		$user->quyen=$request->quyen;
		$user->save();
		return redirect('admin/user');
	}
	public function postDelete($id){
		$user=User::find($id);
		if($user->delete()){
			
		}
		else{
			return redirect('admin/user')->with('thongbao','User đang được sử dụng không xóa được!');
		}
		return redirect('admin/user');

	}
	public function logout(){
		Session::forget('name');
		return redirect('tour');
	}
	public function login(){
		return view('layouts/dangnhap');
	}
	public function register(){
		 
		return view('layouts/dangky');
	}
    //
}
