<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class LoaiPhongController extends Controller
{
    public function AuthLoGin()
    {
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('list-loaiphong');
        }
        else{
             return Redirect::to('admin')->send();
        }
    }

    public function showloaiphong()
    {
        $this->AuthLoGin();
    	$loai = DB::table('tbl_loaiphong')->get();
    	$menageloai = view('admin.loaiphong')->with('loai',$loai);
    	return view('admin_layout')->with('admin.loaiphong',$menageloai);
    }

    public function saveLoaiPhong(Request $request)
    {
        $this->AuthLoGin();
    	$data = array();
    	$data['tenloai'] = $request->tenloai;
        $data['mota'] = $request->mota;
    	
    	DB::table('tbl_loaiphong')->insert($data);
    	session::put('messages','Thêm danh mục thành công!!');
        return Redirect::to('list-loaiphong');

    }
    public function editLoaiPhong($loai_id){
        $this->AuthLoGin();
        $edit_loaiphong = DB::table('tbl_loaiphong')->where('loai_id',$loai_id)->get();
    	$menage_loaiphong = view('admin.editloaiphong')->with('edit_loaiphong',$edit_loaiphong);
    	return view('admin_layout')->with('admin.editloaiphong',$menage_loaiphong);
    }

     public function updateLoaiPhong(Request $request,$loai_id){
        $this->AuthLoGin();
     	$data = array();
        $data['tenloai'] = $request->tenloai;
        $data['mota'] = $request->mota;

    	DB::table('tbl_loaiphong')->where('loai_id',$loai_id)->update($data);
    	session::put('update','Cập nhật danh mục thành công!!');
        return Redirect::to('list-loaiphong');
     }
    public function deleteloaiphong($loaiphong_id){
        DB::table('tbl_loaiphong')->where('loaiphong_id',$loaiphong_id)->delete();
    	session::put('delete','Xóa danh mục thành công!!');
        return Redirect::to('list-loaiphong');
    }


    public function searchloaiphong(Request $request)
    {
        $this->AuthLoGin();
        $timkiem = $request->keywords;
    	$search_loai = DB::table('tbl_loaiphong')->where('tenloai','like','%'.$timkiem.'%')->get();
    	return view('admin.searchloaiphong')->with('search_loai',$search_loai);
    }
}
