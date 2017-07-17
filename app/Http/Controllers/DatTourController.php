<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Dattour;
use App\Tour;
use APP\Tintuc;
use App\Khachhang;
use Carbon\Carbon;
use Session;
 
class DattourController extends Controller
{
    //
    function __construct(){
         $diadiem1=DB::table('diadiem')->get();
         view()->share('diadiem1',$diadiem1);
         $tintuc=DB::table('tintuc')->paginate(5);
         view()->share('tintuc',$tintuc);
    }
    public function viewAdd(){
        $tour=DB::table('tour')->get();
        $khach=DB::table('khachhang')->get();
        return view('admin/dattour/add',['tour'=>$tour,'khach'=>$khach]);
    }
    public function viewEdit($id){
        $dd=DB::table('dattour')->join('tour','dattour.matour','=','tour.id')->join('khachhang','dattour.makhach','=','khachhang.id')->select('dattour.*','tour.tentour','khachhang.tenkhach')->where('dattour.id',$id)->first();
        $tour=DB::table('tour')->where('id','!=',$dd->matour)->get();
        $khach=DB::table('khachhang')->where('id','!=',$dd->matour)->get();
        return view('admin/dattour/edit',['dd'=>$dd,'tour'=>$tour,'khach'=>$khach]);
    }
    public function viewDattour(){
        $tour=DB::table('tour')->join('dattour','tour.id','=','dattour.matour')->select('tour.tentour')->distinct()->get();
        $dattour=DB::table('dattour')->join('tour','dattour.matour','=','tour.id')->join('khachhang','dattour.makhach','=','khachhang.id')->select('dattour.*','tour.tentour','khachhang.tenkhach')->paginate(5);
        return view('admin/dattour/dattour',['dattour'=>$dattour,'tour'=>$tour]);
    }
    public function search(Request $request){
        if(isset($request->tentour))
            $tentour=$request->tentour;
        else
            $tentour='%';
        if(isset($request->trangthai))
           $trangthai=$request->trangthai;
        else
            $trangthai='1';
        settype($trangthai,"int");
        $dattour=DB::table('dattour')->join('tour','dattour.matour','=','tour.id')->join('khachhang','dattour.makhach','=','khachhang.id')->select('dattour.*','tour.tentour','khachhang.tenkhach')->where([['dattour.trangthai',$trangthai],['tour.tentour','like',$tentour]])->paginate(5);
        $tour=DB::table('tour')->join('dattour','tour.id','=','dattour.matour')->select('tour.tentour')->distinct()->get();
            return view('admin/dattour/dattour',['dattour'=>$dattour,'tour'=>$tour,'trangthai'=>$trangthai]);
    }
    public function getViewDetail(){
        $iduser=Session::get('iduser');
        $dattour=DB::table('dattour')->join('tour','dattour.matour','=','tour.id')->select('dattour.*','tour.tentour','tour.ngaykhoihanh')->where('iduser',$iduser)->get();
        return view('layouts/lsdattour',['dattour'=>$dattour]);
    }
    public function getDatTour($id){
     $tour=Tour::where('id',$id)->first();
      $tintuc=DB::table('tintuc')->paginate(5);
      $title=$tour->tentour;
        return view('layouts/datTour',['tour'=>$tour,'tintuc'=>$tintuc], compact('title'));
    }
    public function postEdit(Request $request,$id){
        $Dattour=Dattour::where('id',$id)->first();
        $Dattour->ngaydat=$request->ngaydat;
        $Dattour->matour=$request->matour;
        $Dattour->makhach=$request->makhach;
        $Dattour->songuoi=$request->songuoi;
        $Dattour->trenho=$request->trenho;
        $Dattour->dongia=$request->dongia;
        $Dattour->giamgia=$request->giamgia;
        $Dattour->thanhtien=$request->thanhtien;
        $Dattour->yeucau=$request->yeucau;
        $Dattour->trangthai=$request->trangthai;
        $Dattour->ghichu=$request->ghichu;
        $Dattour->save();
        return redirect('admin/dattour');
    }
    public function postAdd(Request $request){
        $Dattour=new Dattour();
        $Dattour->ngaydat=Carbon::now('Asia/Ho_Chi_Minh');
        $Dattour->matour=$request->matour;
        $Dattour->makhach=$request->makhach;
        $Dattour->songuoi=$request->songuoi;
        $Dattour->trenho=$request->trenho;
        $tour=DB::table('tour')->where('id',$request->matour)->first();
        $Dattour->dongia=$tour->dongia;
        $Dattour->giamgia=$tour->giamgia;
        $dongia1=$tour->dongia*(100-$tour->giamgia)/100;
        $Dattour->thanhtien=$request->songuoi*$dongia1;
        if(isset($request->yeucau))
            $Dattour->yeucau=$request->yeucau;
        else
            $Dattour->yeucau="";
         $Dattour->trangthai=$request->trangthai;
         $Dattour->ghichu=$request->ghichu;
         $Dattour->save();
        return redirect('admin/dattour');
    }
    public function postDelete($id){
        $Dattour=Dattour::find($id);
        $Dattour->delete();
        return redirect('admin/dattour');
    }
    public function postDatTour(Request $request,$id){
    	$Khachhang= new Khachhang();
    	$Khachhang->tenkhach=$request->hoten;
    	$Khachhang->diachi=$request->diachi;
    	$Khachhang->dienthoai=$request->dienthoai;
    	$Khachhang->email=$request->email;
    	$Khachhang->save();
    	$Dattour=new Dattour();
    	$Dattour->ngaydat=Carbon::now('Asia/Ho_Chi_Minh');
    	$Dattour->matour=$id;
		$Dattour->makhach=$Khachhang->id;
		$Dattour->songuoi=$request->songuoi;
		$Dattour->trenho=$request->trenho;
		$tour=DB::table('tour')->where('id',$id)->first();
		$Dattour->dongia=$tour->dongia;
		$Dattour->giamgia=$tour->giamgia;
		$dongia1=$tour->dongia*(100-$tour->giamgia)/100;
		$Dattour->thanhtien=$request->songuoi*$dongia1;
        if(isset($request->yeucau))
		$Dattour->yeucau=$request->yeucau;
        else
            $Dattour->yeucau="";
        $Dattour->trangthai=0;
        $Dattour->iduser=Session::get('iduser');
		$Dattour->save();
		return redirect('tour');
    }
}
