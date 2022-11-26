<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class ViTriController extends Controller
{
    public function AuthLoGin()
    {
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('list-vitri');
        }
        else{
             return Redirect::to('admin')->send();
        }
    }

    public function showvitri()
    {
        $this->AuthLoGin();
    	$vitri = DB::table('tbl_vitri')->paginate(8);
    	$menagevitri = view('admin.vitri')->with('vitri',$vitri);
    	return view('admin_layout')->with('admin.vitri',$menagevitri);
    }

    public function savevitri(Request $request)
    {
        $this->AuthLoGin();
    	$data = array();
    	$data['tenvitri'] = $request->tenvitri;
    	
    	DB::table('tbl_vitri')->insert($data);
    	session::put('messages','Thêm danh mục thành công!!');
        return Redirect::to('list-vitri');

    }
    public function editvitri($vitri_id){
        $this->AuthLoGin();
        $edit_vitri = DB::table('tbl_vitri')->where('vitri_id',$vitri_id)->get();
    	$menage_vitri = view('admin.editvitri')->with('edit_vitri',$edit_vitri);
    	return view('admin_layout')->with('admin.editvitri',$menage_vitri);
    }

     public function updatevitri(Request $request,$vitri_id){
        $this->AuthLoGin();
     	$data = array();
        $data['tenvitri'] = $request->tenvitri;

    	DB::table('tbl_vitri')->where('vitri_id',$vitri_id)->update($data);
    	session::put('update','Cập nhật danh mục thành công!!');
        return Redirect::to('list-vitri');
     }
    public function deletevitri($vitri_id){
        DB::table('tbl_vitri')->where('vitri_id',$vitri_id)->delete();
    	session::put('delete','Xóa danh mục thành công!!');
        return Redirect::to('list-vitri');
    }


    public function searchvitri(Request $request)
    {
        $this->AuthLoGin();
        $timkiem = $request->keywords;
    	$search_vitri = DB::table('tbl_vitri')->where('tenvitri','like','%'.$timkiem.'%')->get();
    	return view('admin.searchvitri')->with('search_vitri',$search_vitri);
    }
}
