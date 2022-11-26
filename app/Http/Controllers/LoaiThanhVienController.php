<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class LoaiThanhVienController extends Controller
{
    public function AuthLoGin()
    {
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('list-loaithanhvien');
        }
        else{
             return Redirect::to('admin')->send();
        }
    }

    public function showloaithanhvien()
    {
        $this->AuthLoGin();
    	$loai = DB::table('tbl_loaithanhvien')->paginate(8);
    	$menageloai = view('admin.loaithanhvien')->with('loai',$loai);
    	return view('admin_layout')->with('admin.loaithanhvien',$menageloai);
    }

    public function saveloaithanhvien(Request $request)
    {
        $this->AuthLoGin();
    	$data = array();
    	$data['tenloai'] = $request->tenloai;
    	
    	DB::table('tbl_loaithanhvien')->insert($data);
    	session::put('messages','Thêm danh mục thành công!!');
        return Redirect::to('list-loaithanhvien');

    }
    public function editloaithanhvien($loai_id){
        $this->AuthLoGin();
        $edit_loaithanhvien = DB::table('tbl_loaithanhvien')->where('loai_id',$loai_id)->get();
    	$menage_loaithanhvien = view('admin.editloaithanhvien')->with('edit_loaithanhvien',$edit_loaithanhvien);
    	return view('admin_layout')->with('admin.editloaithanhvien',$menage_loaithanhvien);
    }

     public function updateloaithanhvien(Request $request,$loai_id){
        $this->AuthLoGin();
     	$data = array();
        $data['tenloai'] = $request->tenloai;

    	DB::table('tbl_loaithanhvien')->where('loai_id',$loai_id)->update($data);
    	session::put('update','Cập nhật danh mục thành công!!');
        return Redirect::to('list-loaithanhvien');
     }
    public function deleteloaithanhvien($loaithanhvien_id){
        DB::table('tbl_loaithanhvien')->where('loaithanhvien_id',$loaithanhvien_id)->delete();
    	session::put('delete','Xóa danh mục thành công!!');
        return Redirect::to('list-loaithanhvien');
    }


    public function searchloaithanhvien(Request $request)
    {
        $this->AuthLoGin();
        $timkiem = $request->keywords;
    	$search_loai = DB::table('tbl_loaithanhvien')->where('tenloai','like','%'.$timkiem.'%')->get();
    	return view('admin.searchloaithanhvien')->with('search_loai',$search_loai);
    }
}
