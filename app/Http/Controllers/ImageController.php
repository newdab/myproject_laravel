<?php

namespace App\Http\Controllers;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Images;
class ImageController extends Controller
{
    //
    public function viewImage(){
    	//$hinhanh=Images::paginate(5);
       
        $hinhanh=DB::table('images-tour')->join('tour','images-tour.matour','tour.id')->select('images-tour.*','tour.tentour')->paginate(5);
         $tour=DB::table('tour')->get();
    	return view('admin/image/image',['hinhanh'=>$hinhanh,'tour'=>$tour]);
    }
    public function Images_sort(Request $request){
       if(isset($request->matour))
        $hinhanh=DB::table('images-tour')->join('tour','images-tour.matour','tour.id')->select('images-tour.*','tour.tentour')->where('matour',$request->matour)->paginate(5);
        else
            $hinhanh=DB::table('images-tour')->join('tour','images-tour.matour','tour.id')->select('images-tour.*','tour.tentour')->paginate(5);
         $tour=DB::table('tour')->where('id','!=',$request->matour)->get();
        return view('admin/image/image',['hinhanh'=>$hinhanh,'tour'=>$tour]);
    }
    public function viewAdd(){
    	$tour=DB::table('tour')->get();
    	return view('admin/image/add',['tour'=>$tour]);
    }
    public function viewEdit($id){
    	$hinhanh=DB::table('images-tour')->join('tour','images-tour.matour','tour.id')->select('images-tour.*','tour.tentour')->where('images-tour.id',$id)->first();
         $tour=DB::table('tour')->where('id','!=',$hinhanh->matour)->get();
    	return view('admin/image/edit',['hinhanh'=>$hinhanh,'tour'=>$tour]);
    }
    public function postAdd(Request $request){
    	$hinhanh=new Images();
    	$hinhanh->matour=$request->matour;
    	$hinhanh->tenanh=$request->tenanh;
    	if($request->hasFile('hinhanh')){
            $file=$request->file('hinhanh');
            $duoi=$file->getClientOriginalExtension();
            if($duoi!='jpg'&& $duoi!='png' && $duoi !='jpeg'){
                return ;
            }
            $hinh=$file->getClientOriginalName();
            $file->move("images/place",$hinh);
        }
        $hinhanh->url=$hinh;
        $hinhanh->save();
        return redirect('admin/image');
    }
    public function postEdit(Request $request,$id){
    	$hinhanh=Images::find($id);
    	$hinhanh->matour=$request->matour;
    	$hinhanh->tenanh=$request->tenanh;
    	if($request->hasFile('hinhanh')){
            $file=$request->file('hinhanh');
            $duoi=$file->getClientOriginalExtension();
            if($duoi!='jpg'&& $duoi!='png' && $duoi !='jpeg'){
                return ;
            }
            $hinh=$file->getClientOriginalName();
            $file->move("images/place",$hinh);
        }
        $hinhanh->url=$hinh;
        $hinhanh->save();
        return redirect('admin/image');
    }
    public function postDelete($id){
    	$hinhanh=Images::find($id);
    	$hinhanh->delete();
    	return redirect('admin/image');
    }

}
