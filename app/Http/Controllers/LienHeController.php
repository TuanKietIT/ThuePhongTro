<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class LienHeController extends Controller
{
    public function AuthLoGin()
    {
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('list-lienhe');
        }
        else{
             return Redirect::to('admin')->send();
        }
    }

    public function showlienhe()
    {
        $this->AuthLoGin();
    	$lienhe = DB::table('tbl_lienhe')->get();
    	$menagelienhe = view('admin.lienhe')->with('lienhe',$lienhe);
    	return view('admin_layout')->with('admin.lienhe',$menagelienhe);
    }
    public function editlienhe($id){
        $this->AuthLoGin();
        $editlienhe = DB::table('tbl_lienhe')->where('id',$id)->get();
        $menagelienhe = view('admin.editlienhe')->with('editlienhe',$editlienhe);
    	return view('admin_layout')->with('admin.editlienhe',$menagelienhe);
    }
    public function savelienhe(Request $request)
    {
    	$data = array();
        $data['hoten'] = $request->hoten;
        $data['email'] = $request->email;
        $data['dienthoai'] = $request->dienthoai;
        $data['tieude'] = $request->tieude;
        $data['noidung'] = $request->noidung;
        
        DB::table('tbl_lienhe')->insert($data);
    	session::put('message1','Thêm thành viên thành công!!');
        return Redirect::to('lien-he');

    }
    public function updatelienhe(Request $request,$id)
    {
    	$data = array();
        $data['email'] = $request->email;
        $data['thoigian'] = $request->thoigian;
        $data['noidung'] = $request->noidung;
        $get_image= $request->file('image');

        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_img = $name_image.rand(0,100).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('./public/upload',$new_img);
            
            $data['thoigian'] = '';
            $data['image'] = $new_img;
            DB::table('tbl_lienhe')->where('id',$id)->update($data);
            session::put('message_lienhe','Thêm thành viên thành công!!');
            return Redirect::to('list-lienhe');
        }
        $data['thoigian'] = '';
    	$data['image'] = '';
        DB::table('tbl_lienhe')->where('id',$id)->update($data);
    	session::put('message1','Thêm thành viên thành công!!');
        return Redirect::to('list-lienhe');

    }
    public function deletelienhe($id){
        DB::table('tbl_lienhe')->where('id',$id)->delete();
    	session::put('delete','Xóa danh mục thành công!!');
        return Redirect::to('list-lienhe');
    }


}
