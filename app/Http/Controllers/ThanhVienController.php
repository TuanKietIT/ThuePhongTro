<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class ThanhVienController extends Controller
{
    public function AuthLoGin()
    {
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('list-thanhvien');
        }
        else{
             return Redirect::to('admin')->send();
        }
    }

    public function showthanhvien()
    {
        $this->AuthLoGin();
    	$thanhvien = DB::table('tbl_thanhvien')->get();
    	$menagethanhvien = view('admin.thanhvien')->with('thanhvien',$thanhvien);
    	return view('admin_layout')->with('admin.thanhvien',$menagethanhvien);
    }
    public function addthanhvien()
    {
        $this->AuthLoGin();
        $loaithanhvien = DB::table('tbl_loaithanhvien')->get();
        return view('admin.addthanhvien')->with('loaithanhvien',$loaithanhvien);
    }
    public function savethanhvien(Request $request)
    {
    	$data = array();
    	$data['loai_id'] = $request->loaithanhvien_use;
        $data['tenthanhvien'] = $request->tenthanhvien;
        $data['dienthoai'] = $request->dienthoai;
        $data['email'] = $request->email;
        $data['password'] = md5($request->password);
        $data['diachi'] = $request->diachi;
        $data['content'] = $request->content;
        $get_image= $request->file('image');

        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_img = $name_image.rand(0,100).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('./public/upload/user',$new_img);
        
            $data['image'] = $new_img;
            DB::table('tbl_thanhvien')->insert($data);
            session::put('message_thanhvien','Thêm thành viên thành công!!');
            return Redirect::to('list-thanhvien');
        }
    	$data['image'] = '';
    	DB::table('tbl_thanhvien')->insert($data);
    	session::put('message1','Thêm thành viên thành công!!');
        return Redirect::to('add-thanhvien');

    }
    public function editthanhvien($id){
        $this->AuthLoGin();
        $loaithanhvien = DB::table('tbl_loaithanhvien')->orderby('loaithanhvien_id','desc')->get();
        $editthanhvien = DB::table('tbl_thanhvien')->where('id',$id)->get();
        $menagethanhvien = view('admin.editthanhvien')->with('editthanhvien',$editthanhvien)->with('loaithanhvien',$loaithanhvien);
    	return view('admin_layout')->with('admin.editthanhvien',$menagethanhvien);
    }
    public function updatethanhvien(Request $request,$id)
    {
    	$data = array();
    	$data['loai_id'] = $request->loaithanhvien_use;
        $data['tenthanhvien'] = $request->tenthanhvien;
        $data['dienthoai'] = $request->dienthoai;
        $data['email'] = $request->email;
        $data['password'] = md5($request->password);
        $data['diachi'] = $request->diachi;
        $data['content'] = $request->content;
        $get_image= $request->file('image');

        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_img = $name_image.rand(0,100).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('./public/upload/user',$new_img);
        
            $data['image'] = $new_img;
            DB::table('tbl_thanhvien')->where('id',$id)->update($data);
            session::put('message_thanhvien','Thêm thành viên thành công!!');
            return Redirect::to('list-thanhvien');
        }
    	$data['image'] = '';
        DB::table('tbl_thanhvien')->where('id',$id)->update($data);
    	session::put('message1','Thêm thành viên thành công!!');
        return Redirect::to('list-thanhvien');

    }
    public function deletethanhvien($id){
        DB::table('tbl_thanhvien')->where('id',$id)->delete();
    	session::put('delete','Xóa danh mục thành công!!');
        return Redirect::to('list-thanhvien');
    }

}
