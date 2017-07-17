<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::group(['prefix'=>'tour'],function(){
	Route::get('gioithieu','TourController@gioithieu');
	Route::get('','TourController@getall');
	Route::get('tournuocngoai','TourController@tournuocngoai');
	Route::get('tourtrongnuoc','TourController@tourtrongnuoc');
	Route::get('timkiem','TourController@search')->name('timkiem');
	Route::get('diadiem/{ten}','TourController@getdiadiem');
	
	Route::get('login','UserController@login');
	Route::post('login','UserController@postLogin')->name('login');
	Route::get('logout','UserController@logout');
	Route::get('dangky','UserController@register');
	Route::post('dangky','UserController@postRegister')->name('register');


	Route::get('chitiet/{id}','TourController@getViewDetail');
	Route::group(['prefix'=>'chitiet/{id}'],function(){
		Route::post('binhluan','BinhluanController@binhluan')->name('binhluan1');
	});
	Route::get('dattour/{id}','DattourController@getDatTour');
	Route::post('dattour/{id}','DattourController@postDatTour')->name('dattour');

	Route::get('tintuc','TintucController@getViewNews');
	Route::get('tintuc/{id}','TintucController@getViewDetail');

	Route::get('lsdattour','DattourController@getViewDetail');
	Route::group(['prefix'=>'ajax'],function(){
		Route::get('loaiTour/{idloaitour}','TourController@getdd');
	});
	
});
Route::get('/{id}','TourController@getViewDetail');
//admin
Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function(){
	Route::group(['prefix'=>'tour'],function(){
		Route::get('','TourController@getTour');
		//add
		Route::get('add','TourController@getadd');
		Route::post('add','TourController@postadd');
		//edit
		
		Route::get('edit/{id}','TourController@getedit');
		Route::get('delete/{id}','TourController@getxoa');

});
	Route::group(['prefix'=>'khachsan'],function(){
		Route::get('','KhachsanController@getkhs');
		Route::get('add','KhachsanController@getadd');
		Route::get('edit/{id}','KhachsanController@viewEdit');
		Route::post('add','KhachsanController@postAdd');
		Route::post('edit/{id}','KhachsanController@postEdit');
		Route::get('delete/{id}','KhachsanController@postDelete');
	});
	Route::group(['prefix'=>'tintuc'],function(){
		Route::get('','TintucController@getnews');
		Route::get('add','TintucController@viewAdd');
		Route::get('edit/{id}','TintucController@viewEdit');
		Route::post('add','TintucController@postAdd');
		Route::post('edit/{id}','TintucController@postEdit');
		Route::get('delete/{id}','TintucController@postDelete');
	});
	Route::group(['prefix'=>'dattour'],function(){
		Route::get('timkiem','DattourController@search');
		Route::get('','DattourController@viewDattour');
		Route::get('add','DattourController@viewAdd');
		Route::get('edit/{id}','DattourController@viewEdit');
		Route::post('edit/{id}','DattourController@postEdit');
		Route::post('add','DattourController@postAdd');
		Route::get('delete/{id}','DattourController@postDelete');
	});
	Route::group(['prefix'=>'khachhang'],function(){
		Route::get('','KhachhangController@viewKhachhang');
		Route::get('add','KhachhangController@viewAdd');
		Route::get('edit/{id}','KhachhangController@viewEdit');
		Route::post('add','KhachhangController@postAdd');
		Route::post('edit/{id}','KhachhangController@postEdit');
		Route::get('delete/{id}','KhachhangController@postDelete');
	});
	Route::group(['prefix'=>'user'],function(){
		Route::get('','UserController@viewUser');
		Route::get('add','UserController@viewAdd');
		Route::get('edit/{id}','UserController@viewEdit');
		Route::post('add','UserController@postAdd');
		Route::post('edit/{id}','UserController@postEdit');
		Route::get('delete/{id}','UserController@postDelete');
	});
	Route::group(['prefix'=>'image'],function(){
		Route::get('','ImageController@viewImage');
		Route::get('add','ImageController@viewAdd');
		Route::get('edit/{id}','ImageController@viewEdit');
		Route::post('add','ImageController@postAdd');
		Route::post('edit/{id}','ImageController@postEdit');
		Route::get('delete/{id}','ImageController@postDelete');
		Route::get('sort','ImageController@Images_sort');
	});
	Route::group(['prefix'=>'diadiem'],function(){
		Route::get('','DiadiemController@viewDiadiem');
		Route::get('add','DiadiemController@viewAdd');
		Route::get('edit/{id}','DiadiemController@viewEdit');
		Route::post('add','DiadiemController@postAdd');
		Route::post('edit/{id}','DiadiemController@postEdit');
		Route::get('delete/{id}','DiadiemController@postDelete');
	});
	Route::group(['prefix'=>'khachsan-tour'],function(){
		Route::get('','KhachsanController@viewkt');
		Route::get('sort','KhachsanController@viewkt_sort');
		Route::get('add','KhachsanController@viewAdd');
		Route::get('edit/{matour}/{makhs}','KhachsanController@viewEditKt');
		Route::post('add','KhachsanController@postAddKt');
		Route::post('edit/{matour}/{makhs}','KhachsanController@postEditKt');
		Route::get('delete/{matour}/{makhs}','KhachsanController@postDeleteKt');
	});
	Route::post('tour/edit/test/{id}','TourController@postedit');
	});
Route::get('add',function(){
	return view('admin/test');
});