<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Tintuc;
use Carbon\Carbon;
class TintucController extends Controller
{
    //
    function __construct(){
         $diadiem1=DB::table('diadiem')->get();
         view()->share('diadiem1',$diadiem1);
    }
    public function viewAdd(){
        return view('admin/tintuc/add');
    }
    public function viewEdit($id){
        $tintuc=DB::table('tintuc')->where('id',$id)->first();
        return view('admin/tintuc/edit',['tintuc'=>$tintuc]);
    }
    public function getnews(){
    	$tintuc=DB::table('tintuc')->
    	paginate(5);
    	return view('admin/tintuc/tintuc',['tintuc'=>$tintuc]);
    }
    public function getViewNews(){
    	$tintuc=DB::table('tintuc')->
    	paginate(5);
    	return view('layouts/ptintuc',['tintuc'=>$tintuc]);
    }
    public function getViewDetail($id){
    	$new=DB::table('tintuc')->where('id',$id)->first();
    	$tintuc=DB::table('tintuc')->
    	paginate(5);
    	return view('layouts/doctin',['tintuc'=>$tintuc,'new'=>$new]);
    }
    public function postAdd(Request $request){
        $tintuc=new Tintuc();
        $tintuc->tieude=$request->tieude;
        $tintuc->ngaydang=Carbon::now('Asia/Ho_Chi_Minh');
        $tintuc->tomtat=$request->tomtat;
        $tintuc->chitiet=$request->chitiet;
        if($request->hasFile('hinhanh')){
            $file=$request->file('hinhanh');
            $duoi=$file->getClientOriginalExtension();
            if($duoi!='jpg'&& $duoi!='png' && $duoi !='jpeg'){
                return ;
            }
            $hinh=$file->getClientOriginalName();
            $file->move("images/news",$hinh);
        }
        $tintuc->hinhanh=$hinh;
        $tintuc->tacgia=$request->tacgia;
        $tintuc->save();
        return redirect('admin/tintuc');
    }
    public function postEdit(Request $request,$id){
        $tintuc=Tintuc::where('id',$id)->first();
        $tintuc->tieude=$request->tieude;
        $tintuc->ngaydang=Carbon::now('Asia/Ho_Chi_Minh');
        $tintuc->tomtat=$request->tomtat;
        $tintuc->chitiet=$request->chitiet;
        if($request->hasFile('hinhanh')){
            $file=$request->file('hinhanh');
            $duoi=$file->getClientOriginalExtension();
            if($duoi!='jpg'&& $duoi!='png' && $duoi !='jpeg'){
                return ;
            }
            $hinh=$file->getClientOriginalName();
            $file->move("images/news",$hinh);
        }
        $tintuc->hinhanh=$hinh;
        $tintuc->tacgia=$request->tacgia;
        $tintuc->save();
        return redirect('admin/tintuc');
    }
    public function postDelete($id){
        $tintuc=Tintuc::find($id);
        $tintuc->delete();
        return redirect('admin/tintuc');
    }
}
