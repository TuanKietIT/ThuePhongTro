<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class AdminController extends Controller
{
    public function AuthLoGin()
    {
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('Kindroom');
        }
        else{
             return Redirect::to('admin')->send();
        }
    }
    public function index()
     {
        return view('admin_login');
     }
     public function show_admin()
     {
        $this->AuthLoGin();
        $admin = DB::table('tbl_admin')->get();
         return view('admin.dashboard')->with('admin',$admin);;
     }
     public function dashboard(Request $request)
     {   
        $this->AuthLoGin();
         $admin_email = $request->admin_email;
         $admin_password = $request->admin_password;
 
         $result = DB::table('tbl_admin')->where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();
         
        if($result) {
    		Session::put('admin_name',$result->admin_name);
            Session::put('admin_image',$result->admin_image);
    		Session::put('admin_id',$result->admin_id);
    		return Redirect::to('/dashboard');
    	}
    	else{
    		Session::put('message','Email hoặc mật khẩu không đúng');
    		return Redirect::to('/admin');
    	}
 
     }
     public function log_out()
     {
         Session::put('admin_name',null);
         Session::put('admin_id',null);
         return Redirect::to('/admin');
     }
     public function showadmin()
    {
        $this->AuthLoGin();
    	$admin = DB::table('tbl_admin')->get();
    	$menageadmin = view('admin.admin')->with('admin',$admin);
    	return view('admin_layout')->with('admin.admin',$menageadmin);
    }
    public function saveadmin(Request $request)
    {
    	$data = array();
        $data['admin_name'] = $request->admin_name;
        $data['admin_email'] = $request->admin_email;
        $data['admin_password'] = $request->admin_password;
        $get_image= $request->file('admin_image');

        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_img = $name_image.rand(0,100).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('./public/upload',$new_img);
        
            $data['admin_image'] = $new_img;
            DB::table('tbl_admin')->insert($data);
            session::put('message_admin','Thêm thành viên thành công!!');
            return Redirect::to('list-admin');
        }
    	$data['image'] = '';
    	DB::table('tbl_admin')->insert($data);
    	session::put('message1','Thêm thành viên thành công!!');
        return Redirect::to('add-admin');

    }
    public function editadmin($admin_id){
        $this->AuthLoGin();
        $editadmin = DB::table('tbl_admin')->where('admin_id',$admin_id)->get();
        $menageadmin = view('admin.editadmin')->with('editadmin',$editadmin);
    	return view('admin_layout')->with('admin.editadmin',$menageadmin);
    }
    public function updateadmin(Request $request,$admin_id)
    {
    	$data = array();
        $data['admin_name'] = $request->admin_name;
        $data['admin_email'] = $request->admin_email;
        $data['admin_password'] = $request->admin_password;
        $get_image= $request->file('admin_image');

        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_img = $name_image.rand(0,100).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('./public/upload',$new_img);
            
            $data['admin_image'] = $new_img;
            DB::table('tbl_admin')->where('admin_id',$admin_id)->update($data);
            session::put('message_admin','Thêm thành viên thành công!!');
            return Redirect::to('list-admin');
        }
    	$data['image'] = '';
        DB::table('tbl_admin')->where('admin_id',$admin_id)->update($data);
    	session::put('message1','Thêm thành viên thành công!!');
        return Redirect::to('list-admin');

    }
    public function deleteadmin($id){
        DB::table('tbl_admin')->where('admin_id',$admin_id)->delete();
    	session::put('delete','Xóa danh mục thành công!!');
        return Redirect::to('list-admin');
    }

}
