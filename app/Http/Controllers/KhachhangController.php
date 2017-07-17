<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Khachhang;
class KhachhangController extends Controller
{
    //
    public function viewKhachhang(){
    	$khachhang=DB::table('khachhang')->paginate(5);
    	return view('admin/khachhang/khachhang',['khachhang'=>$khachhang]);
    }
    public function viewAdd(){
    	return view('admin/khachhang/add');
    }
    public function viewEdit($id){
    	$khach=DB::table('khachhang')->where('id',$id)->first();
    	return view('admin/khachhang/edit',['khach'=>$khach]);
    }
    public function postAdd(Request $request){
        $khachhang=new Khachhang();
        $khachhang->tenkhach=$request->tenkhach;
        $khachhang->diachi=$request->diachi;
        $khachhang->dienthoai=$request->dienthoai;
        $khachhang->email=$request->email;
        $khachhang->save();
        return redirect('admin/khachhang');
    }
    public function postEdit(Request $request,$id){
        $khachhang=Khachhang::where('id',$id)->first();
        $khachhang->tenkhach=$request->tenkhach;
        $khachhang->diachi=$request->diachi;
        $khachhang->dienthoai=$request->dienthoai;
        $khachhang->email=$request->email;
        $khachhang->save();
        return redirect('admin/khachhang');
    }
    public function postDelete($id){
        $khachhang=Khachhang::find($id);
        $khachhang->delete();
        return redirect('admin/khachhang');
    }
}
