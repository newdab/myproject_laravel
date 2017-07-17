<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Khachsan;
use Illuminate\Support\Facades\DB;

class KhachsanController extends Controller
{
    //
    public function getkhs(){
        $hotels=DB::table('khachsan')->paginate(5);
    	return view('admin/khachsan/khachsan',['hotels'=>$hotels]);
    }
    public function getadd(){
    	return view('admin/khachsan/add');
    }
    public function viewEdit($id){
    	$kk=DB::table('khachsan')->where('id',$id)->first();
    	return view('admin/khachsan/edit',['kk'=>$kk]);
    }
    public function postAdd(Request $request){
        $khachsan=new Khachsan();
        $khachsan->tenkhs=$request->tenkhs;
        $khachsan->diachi=$request->diachi;
        $khachsan->dienthoai=$request->dienthoai;
        $khachsan->chatluong=$request->chatluong;
        $khachsan->ghichu=$request->ghichu;
        $khachsan->save();
        return redirect('admin/khachsan');
    }
    public function postEdit(Request $request,$id){
        $khachsan=Khachsan::where('id',$id)->first();
        $khachsan->tenkhs=$request->tenkhs;
        $khachsan->diachi=$request->diachi;
        $khachsan->dienthoai=$request->dienthoai;
        $khachsan->chatluong=$request->chatluong;
        $khachsan->ghichu=$request->ghichu;
        $khachsan->save();
        return redirect('admin/khachsan');
    }
    public function postDelete($id){
        $khachsan=Khachsan::find($id);
        $khachsan->delete();
        return redirect('admin/khachsan');
    }
    public function viewkt(){
        $tour=DB::table('tour')->get();
        $kt=DB::table('khachsan-tour')->join('tour','khachsan-tour.matour','=','tour.id')->join('khachsan','khachsan-tour.makhs','=','khachsan.id')->select('khachsan-tour.*','tour.tentour','khachsan.tenkhs')->paginate(5);
        return view('admin/khachsan-tour/khachsan-tour',['kt'=>$kt,'tour'=>$tour]);
    }
    public function viewkt_sort(Request $request){
        if(isset($request->matour))
            $kt=DB::table('khachsan-tour')->join('tour','khachsan-tour.matour','=','tour.id')->join('khachsan','khachsan-tour.makhs','=','khachsan.id')->select('khachsan-tour.*','tour.tentour','khachsan.tenkhs')->where('matour',$request->matour)->paginate(5);
        else
            $kt=DB::table('khachsan-tour')->join('tour','khachsan-tour.matour','=','tour.id')->join('khachsan','khachsan-tour.makhs','=','khachsan.id')->select('khachsan-tour.*','tour.tentour','khachsan.tenkhs')->paginate(5);
        $tour=DB::table('tour')->get();
        return view('admin/khachsan-tour/khachsan-tour',['kt'=>$kt,'tour'=>$tour]);
    }
    public function viewAdd(){
        $tour=DB::table('tour')->get();
        $khachsan=Khachsan::all();
        return view('admin/khachsan-tour/add',['tour'=>$tour,'khachsan'=>$khachsan]);

    }
    public function viewEditKt($matour,$makhs){
       $kt=DB::table('khachsan-tour')->join('tour','khachsan-tour.matour','=','tour.id')->join('khachsan','khachsan-tour.makhs','=','khachsan.id')->select('khachsan-tour.*','tour.tentour','khachsan.tenkhs')->where([['matour',$matour],['makhs',$makhs],])->first();
       $tour=DB::table('tour')->where('id','!=',$matour)->get();
        $khachsan=Khachsan::where('id','!=',$makhs);
        return view('admin/khachsan-tour/edit',['kt'=>$kt,'tour'=>$tour,'khachsan'=>$khachsan]);
   }
   public function postAddKt(Request $request){
        $kt=DB::table('khachsan-tour')->where([['matour',$request->matour],['makhs',$request->makhs],])->count();
        if($kt==0){
             DB::table('khachsan-tour')->insert(['matour'=>$request->matour,'makhs'=>$request->makhs,'chitiet'=>$request->chitiet]);
        return redirect('admin/khachsan-tour');
        }
        else{
            return redirect('admin/khachsan-tour/add')->with('thongbao','thông tin tour-khách sạn đã tồn tại');
        }
       
   }
   public function postEditKt(Request $request,$matour,$makhs){
        DB::table('khachsan-tour')->where([['matour',$matour],['makhs',$makhs],])->update(['matour'=>$request->matour,'makhs'=>$request->makhs,'chitiet'=>$request->chitiet]);
        return redirect('admin/khachsan-tour');
   }
   public function postDeleteKt($matour,$makhs){
        DB::table('khachsan-tour')->where([['matour',$matour],['makhs',$makhs],])->delete();
        return redirect('admin/khachsan-tour');
   }
   
}
