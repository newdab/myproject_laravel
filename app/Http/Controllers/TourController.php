<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Tour;
use APP\Tintuc;
use APP\Khachsan;
use APP\Binhluan;
use Illuminate\Pagination\LengthAwarePaginator;
class TourController extends Controller
{
    function __construct(){
        $tintuc=DB::table('tintuc')->paginate(5);
         view()->share('tintuc',$tintuc);
         $diadiem1=DB::table('diadiem')->get();
         view()->share('diadiem1',$diadiem1);
    }
    public function tournuocngoai(){
        $tours=DB::table('tour')->where('trongnuoc',0)->paginate(4);
        $tintuc=DB::table('tintuc')->paginate(5);
        return view('layouts/tourngoainuoc',['tours'=>$tours,'tintuc'=>$tintuc]);
    }
    public function tourtrongnuoc(){
         $tours=DB::table('tour')->where('trongnuoc',1)->paginate(4);
        $tintuc=DB::table('tintuc')->paginate(5);
        return view('layouts/tourtrongnuoc',['tours'=>$tours,'tintuc'=>$tintuc]);
    }
    public function gioithieu(){
        $diadiem=DB::table('diadiem')->paginate(2);
        $tintuc=DB::table('tintuc')->paginate(5);
      return view('layouts/gioithieu',['tintuc'=>$tintuc,'diadiem'=>$diadiem]);
    }

    public function getall(){
        $tours=DB::table('tour')->paginate(14);
        $tintuc=DB::table('tintuc')->paginate(5);
        return view('layouts/trangchu',['tours'=>$tours,'tintuc'=>$tintuc]);
    }
    public function getViewDetail($id){
        $tour=DB::table('tour')->where('id',$id)->first();
        $hinh=DB::table('images-tour')->where('matour',$id)->paginate(4);
        $khachsan=DB::table('khachsan')->join('khachsan-tour','khachsan.id','=','khachsan-tour.makhs')->where('khachsan-tour.matour',$id)->select('khachsan.*')->get();
        $binhluan=DB::table('binhluan')->where('matour',$id)->paginate(5);
        $lichtrinh='%'.$tour->diemkhoihanh.'%';
        $tourlq=DB::table('tour')->where([['lichtrinh','like',$lichtrinh],['id','!=',$id],])->paginate(4);
        $title=$tour->tentour;
        return view('layouts/chitiettour',['tour'=>$tour,'tourlq'=>$tourlq,'binhluan'=>$binhluan,'khachsan'=>$khachsan,'hinh'=>$hinh], compact('title'));
    }
    public function search(Request $request){
        if(isset($request->loaiTour))
            $loaitour=$request->loaiTour;
        else $loaitour='%';
        if(isset($request->khoihanh))
            $khoihanh=$request->khoihanh;
        else $khoihanh='%';
        if(isset($request->thoigian))
            $thoigian=$request->thoigian;
        else $thoigian='%';
        if(isset($request->dongia))
            $dongia=$request->dongia;
        else
            $dongia="0-100";
        if(isset($request->diadiem))
            $diadiem=$request->diadiem;
        else
            $diadiem='%';
        $arr=explode('-', $dongia);
        $giamin=$arr[0];
        $giamax=$arr[1];
        settype($giamin,"int");
        settype($giamax, "int");
        $giamax*=1000000;
        $giamin*=1000000;
        $diadiem1='%'.$diadiem.'%';
        $tours=DB::table('tour')->where([['trongnuoc',$loaitour],['diemkhoihanh','like',$khoihanh],['thoigian','like',$thoigian],['dongia','>=',$giamin],['dongia','<=',$giamax],['lichtrinh','like',$diadiem1],])->paginate(7);
         $tintuc=DB::table('tintuc')->paginate(5);
        return view('layouts/timkiem',['tours'=>$tours,'tintuc'=>$tintuc]);
    }
    public function getdiadiem($ten){
        $diadiem='%'.$ten.'%';
        $tours=DB::table('tour')->where('lichtrinh','like',$diadiem)->paginate(5);
        return view('layouts/timkiem',['tours'=>$tours]);
    }
    public function getTour(){
        $tours=DB::table('tour')->paginate(5);
    	return view('admin/tour/tour',['tours'=>$tours]);
    }
    //add
    public function getadd(){
        return view('admin.tour.add');
    }
    public function postadd(Request $request){
    	$Tour=new Tour();
    	$Tour->tentour=$request->tentour;
    	$Tour->thoigian=$request->thoigian;
    	$Tour->ngaykhoihanh=$request->ngaykh;
    	$Tour->diemkhoihanh=$request->diemkh;
    	$Tour->lichtrinh=$request->lichtrinh;
        if(isset($request->chitiet))
    	   $Tour->chitiet=$request->chitiet;
        else{
            return redirect('admin/tour/add')->with('thongbao','nhập đầy đủ thông tin');
        }
        if($request->hasFile('hinhanh')){
            $file=$request->file('hinhanh');
            $duoi=$file->getClientOriginalExtension();
            if($duoi!='jpg'&& $duoi!='png' && $duoi !='jpeg'){
                return ;
            }
            $hinh=$file->getClientOriginalName();
            $file->move("images/place",$hinh);
        }
        else{
            return redirect('admin/tour/add')->with('thongbao','nhập đầy đủ thông tin');
        }
        $Tour->hinhanh=$hinh;
    	$Tour->dongia=$request->dongia;
    	$Tour->soluong=$request->soluong;
    	$Tour->keywords=$request->keywords;
    	$Tour->giamgia=$request->giamgia;
    	$Tour->ghichu=$request->ghichu;
    	$Tour->tourhot=$request->tourhot;
    	$Tour->save();
    	return redirect('admin/tour/add');
    }
    //edit
    public function getedit($id){
        $tour=Tour::where('id',$id)->first();
        return view('admin.tour/edit',['tour'=>$tour]);
    }
    public function postedit(Request $request,$id){
           // DB:updade("update tour set tentour='$request->tentour',thoigian='$request->thoigian,ngaykhoihanh='$request->ngaykh'",)
        $Tour=Tour::where('id',$id)->first();
        $Tour->tentour=$request->tentour;
        $Tour->thoigian=$request->thoigian;
        $Tour->ngaykhoihanh=$request->ngaykh;
        if($request->hasFile('hinhanh')){
            $file=$request->file('hinhanh');
            $duoi=$file->getClientOriginalExtension();
            if($duoi!='jpg'&& $duoi!='png' && $duoi !='jpeg'){
                return ;
            }
            $hinh=$file->getClientOriginalName();
            $file->move("images/place",$hinh);
        }
        $Tour->hinhanh=$hinh;
       // $Tour->hinhanh=$request->hinhanh;
        $Tour->diemkhoihanh=$request->diemkh;
        $Tour->lichtrinh=$request->lichtrinh;
        $Tour->chitiet=$request->chitiet;
        $Tour->dongia=$request->dongia;
        $Tour->soluong=$request->soluong;
        $Tour->keywords=$request->keywords;
        $Tour->giamgia=$request->giamgia;
        $Tour->ghichu=$request->ghichu;
        $Tour->tourhot=$request->tourhot;
        $Tour->save();   
        return redirect('admin/tour');
          
    }
    public function getxoa($id){
        $Tour=Tour::find($id);
        $Tour->delete();
        return redirect('admin/tour');
    }
    public function getdd($idloaitour){
        $diadiem=DB::table('diadiem')->where('trongnuoc','like',$idloaitour)->get();
        foreach($diadiem as $dd){
            echo " <option value='".$dd->tendiadiem."'>".$dd->tendiadiem."</option>";
        }
        
    }
}
