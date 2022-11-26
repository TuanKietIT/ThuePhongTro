<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class DangTinController extends Controller
{
    public function AuthLoGin()
    {
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('list-dangtin');
        }
        else{
             return Redirect::to('admin')->send();
        }
    }
    public function showdangtin()
    {
        $this->AuthLoGin();
    	$dangtins = DB::table('tbl_dangtin')->orderby('id','desc')->paginate(5);
    	$menagedangtin = view('admin.dangtin')->with('dangtins',$dangtins);
    	return view('admin_layout')->with('admin.dangtin',$menagedangtin);
    }
    public function adddangtin()
    {
        $this->AuthLoGin();
        $loaiphong = DB::table('tbl_loaiphong')->orderby('loaiphong_id','desc')->get();
        $vitri = DB::table('tbl_vitri')->orderby('vitri_id','desc')->get();
        $thanhvien = DB::table('tbl_thanhvien')->orderby('id','desc')->get();
        return view('admin.adddangtin')->with('loaiphong',$loaiphong)->with('vitri',$vitri)->with('thanhvien',$thanhvien);
    }
    public function savedangtin(Request $request)
    {
        
    	$data = array();
    	$data['loaiphong_id'] = $request->loaiphong_use;
        $data['vitri_id'] = $request->vitri_use;
        $data['hoten'] = $request->hoten;
        $data['tenbaiviet'] = $request->tieude;
        $data['tieude'] = $request->tieude;
        $data['email'] = $request->email;
        $data['dienthoai'] = $request->dienthoai;
        $data['diachi'] = $request->diachi;
        $data['tinhtrang'] = $request->tinhtrang;
        $data['gia'] = $request->gia;
        $data['dientich'] = $request->dientich;
        $data['mota'] = $request->mota;
        $data['ngaycapnhat'] = $request->ngaycapnhat;
        $get_image= $request->file('image');

        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_img = $name_image.rand(0,100).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('./public/upload/dangtin',$new_img);
        
            $data['image'] = $new_img;
            DB::table('tbl_dangtin')->insert($data);
            session::put('message_dangtin','Thêm thành viên thành công!!');
            return Redirect::to('list-dangtin');
        }
    	$data['image'] = '';
    	DB::table('tbl_dangtin')->insert($data);
    	session::put('message1','Thêm thành viên thành công!!');
        return Redirect::to('add-dangtin');

    }
    public function editdangtin($id){
        $this->AuthLoGin();
        $loaiphong = DB::table('tbl_loaiphong')->orderby('loaiphong_id','desc')->get();
        $vitri = DB::table('tbl_vitri')->orderby('vitri_id','desc')->get();
        $thanhvien = DB::table('tbl_thanhvien')->orderby('id','desc')->get();
        $editdangtin = DB::table('tbl_dangtin')->where('id',$id)->get();
        $menagedangtin = view('admin.editdangtin')->with('editdangtin',$editdangtin)->with('loaiphong',$loaiphong)->with('vitri',$vitri)->with('thanhvien',$thanhvien);;
    	return view('admin_layout')->with('admin.editdangtin',$menagedangtin);
    }
    public function updatedangtin(Request $request,$id)
    {
    	$data['loaiphong_id'] = $request->loaiphong_use;
        $data['vitri_id'] = $request->vitri_use;
        $data['hoten'] = $request->hoten;
        $data['tenbaiviet'] = $request->tieude;
        $data['tieude'] = $request->tieude;
        $data['email'] = $request->email;
        $data['dienthoai'] = $request->dienthoai;
        $data['diachi'] = $request->diachi;
        $data['tinhtrang'] = $request->tinhtrang;
        $data['gia'] = $request->gia;
        $data['dientich'] = $request->dientich;
        $data['mota'] = $request->mota;
        $data['ngaycapnhat'] = $request->ngaycapnhat;
        $get_image= $request->file('image');

        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_img = $name_image.rand(0,100).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('./public/upload/dangtin',$new_img);
        
            $data['image'] = $new_img;
            DB::table('tbl_dangtin')->where('id',$id)->update($data);
            session::put('message_dangtin','Thêm thành viên thành công!!');
            return Redirect::to('list-dangtin');
        }
    	$data['image'] = '';
        DB::table('tbl_dangtin')->where('id',$id)->update($data);
    	session::put('message1','Thêm thành viên thành công!!');
        return Redirect::to('list-dangtin');

    }
    public function deletedangtin($id){
        DB::table('tbl_dangtin')->where('id',$id)->delete();
    	session::put('delete','Xóa danh mục thành công!!');
        return Redirect::to('list-dangtin');
    }
    public function unactive_dangtin($id){
        $this->AuthLogin();
        DB::table('tbl_dangtin')->where('id',$id)->update(['hienthi'=>1]);
        Session::put('message','Không kích hoạt đăng tin thành công');
        return Redirect::to('list-dangtin');

    }
    public function active_dangtin($id){
        $this->AuthLogin();
        DB::table('tbl_dangtin')->where('id',$id)->update(['hienthi'=>0]);
        Session::put('message','Kích hoạt đăng tin thành công');
        return Redirect::to('list-dangtin');
    }
}
