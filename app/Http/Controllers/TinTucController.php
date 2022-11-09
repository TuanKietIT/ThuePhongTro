<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class TinTucController extends Controller
{
    public function AuthLoGin()
    {
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('list-tintuc');
        }
        else{
             return Redirect::to('admin')->send();
        }
    }

    public function showtintuc()
    {
        $this->AuthLoGin();
    	$tintuc = DB::table('tbl_tintuc')->get();
    	$menagetintuc = view('admin.tintuc')->with('tintuc',$tintuc);
    	return view('admin_layout')->with('admin.tintuc',$menagetintuc);
    }
    public function addtintuc()
    {
        $this->AuthLoGin();
        return view('admin.addtintuc');
    }
    public function savetintuc(Request $request)
    {
    	$data = array();
        $data['tentieude'] = $request->tentieude;
        $data['thoigian'] = $request->thoigian;
        $data['mota'] = $request->mota;
        $get_image= $request->file('image');

        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_img = $name_image.rand(0,100).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('./public/upload',$new_img);
        
            $data['image'] = $new_img;
            DB::table('tbl_tintuc')->insert($data);
            session::put('message_tintuc','Thêm thành viên thành công!!');
            return Redirect::to('list-tintuc');
        }
    	$data['image'] = '';
    	DB::table('tbl_tintuc')->insert($data);
    	session::put('message1','Thêm thành viên thành công!!');
        return Redirect::to('add-tintuc');

    }
    public function edittintuc($id){
        $this->AuthLoGin();
        $edittintuc = DB::table('tbl_tintuc')->where('id',$id)->get();
        $menagetintuc = view('admin.edittintuc')->with('edittintuc',$edittintuc);
    	return view('admin_layout')->with('admin.edittintuc',$menagetintuc);
    }
    public function updatetintuc(Request $request,$id)
    {
    	$data = array();
    	$data = array();
        $data['tentieude'] = $request->tentieude;
        $data['thoigian'] = "$request->thoigian";
        $data['mota'] = $request->mota;
        $get_image= $request->file('image');

        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_img = $name_image.rand(0,100).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('./public/upload',$new_img);
            
            $data['thoigian'] = '';
            $data['image'] = $new_img;
            DB::table('tbl_tintuc')->where('id',$id)->update($data);
            session::put('message_tintuc','Thêm thành viên thành công!!');
            return Redirect::to('list-tintuc');
        }
        $data['thoigian'] = '';
    	$data['image'] = '';
        DB::table('tbl_tintuc')->where('id',$id)->update($data);
    	session::put('message1','Thêm thành viên thành công!!');
        return Redirect::to('list-tintuc');

    }
    public function deletetintuc($id){
        DB::table('tbl_tintuc')->where('id',id)->delete();
    	session::put('delete','Xóa danh mục thành công!!');
        return Redirect::to('list-tintuc');
    }

}
