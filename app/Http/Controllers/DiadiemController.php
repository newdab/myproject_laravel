<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Diadiem;
class DiadiemController extends Controller
{
	public function viewDiadiem(){
		$diadiem=DB::table('diadiem')->paginate(5);
		//$diadiem=Diadiem::all();
		return view('admin/diadiem/diadiem',['diadiem'=>$diadiem]);
	}
	public function viewAdd(){
		return view('admin/diadiem/add');
	}
	public function viewEdit($id){
		$dd=Diadiem::find($id);
		return view('admin/diadiem/edit',['dd'=>$dd]);
	}
	public function postAdd(Request $request){
		$diadiem=new Diadiem();
		$diadiem->tendiadiem=$request->tendiadiem;
		$diadiem->mota=$request->mota;
		if($request->hasFile('hinhanh')){
            $file=$request->file('hinhanh');
            $duoi=$file->getClientOriginalExtension();
            if($duoi!='jpg'&& $duoi!='png' && $duoi !='jpeg'){
                return ;
            }
            $hinh=$file->getClientOriginalName();
            $file->move("images/gioithieu",$hinh);
        }
        $diadiem->hinhanh=$hinh;
        if(isset($request->trongnuoc))
        	$diadiem->trongnuoc=1;
        else
        	$diadiem->trongnuoc=0;
        $diadiem->save();
        return redirect('admin/diadiem');
	}
	public function postEdit(Request $request,$id){
		$diadiem=Diadiem::find($id);
		$diadiem->tendiadiem=$request->tendiadiem;
		$diadiem->mota=$request->mota;
		if($request->hasFile('hinhanh')){
            $file=$request->file('hinhanh');
            $duoi=$file->getClientOriginalExtension();
            if($duoi!='jpg'&& $duoi!='png' && $duoi !='jpeg'){
                return ;
            }
            $hinh=$file->getClientOriginalName();
            $file->move("images/gioithieu",$hinh);
        }
        $diadiem->hinhanh=$hinh;
        if(isset($request->trongnuoc))
        	$diadiem->trongnuoc=1;
        else
        	$diadiem->trongnuoc=0;
        $diadiem->save();
		return redirect('admin/diadiem');
	}
	public function postDelete($id){
		$diadiem=Diadiem::find($id);
		$diadiem->delete();
		return redirect('admin/diadiem');
	}
    //
}
