<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class HomeController extends Controller
{
    public function index(Request $request){
    	$dangtin = DB::table('tbl_dangtin')->where('hienthi','0')->paginate(6);
        $vitri = DB::table('tbl_vitri')->get();
        $loaiphong = DB::table('tbl_loaiphong')->get();
    	$menagedangtin = view('home.index')->with('dangtin',$dangtin)->with('vitri',$vitri)->with('loaiphong',$loaiphong);
    	return view('welcome')->with('home.index',$menagedangtin);
    }
    public function dangnhap(){
    	return view('home.dangnhap');
    }
    public function dangky(){
        $loaithanhvien = DB::table('tbl_loaithanhvien')->get();
    	return view('home.dangky')->with('loaithanhvien',$loaithanhvien);;
    }
    public function tintuc(){
        $tintuc = DB::table('tbl_tintuc')->orderby('id','desc')->paginate(6);
        $vitri = DB::table('tbl_vitri')->get();
    	return view('home.tintuc')->with('tintuc',$tintuc)->with('vitri',$vitri);
    }
    public function lienhe(){
        $loaiphong = DB::table('tbl_loaiphong')->orderby('loaiphong_id','desc')->get();
        $vitri = DB::table('tbl_vitri')->orderby('vitri_id','desc')->get();
    	return view('home.lienhe')->with('loaiphong',$loaiphong)->with('vitri',$vitri);
    }
    public function dangtin(){
        $loaiphong = DB::table('tbl_loaiphong')->orderby('loaiphong_id','desc')->get();
        $vitri = DB::table('tbl_vitri')->get();
        $thanhvien = DB::table('tbl_thanhvien')->orderby('id','desc')->get();
    	return view('home.dangtin')->with('loaiphong',$loaiphong)->with('vitri',$vitri)->with('thanhvien',$thanhvien);
    }
    public function showViTri($vitri_id){
        $vitri = DB::table('tbl_vitri')->get();
        $category_by_id = DB::table('tbl_dangtin')->join('tbl_vitri','tbl_dangtin.vitri_id','=','tbl_vitri.vitri_id')->where('tbl_dangtin.vitri_id',$vitri_id)->get();
    	return view('home.danhmucvitri')->with('category_by_id',$category_by_id)->with('vitri',$vitri);
    }
    public function search(Request $request)
    {
        $timkiem = $request->keywords;
        $vitri = DB::table('tbl_vitri')->get();
    	$search = DB::table('tbl_dangtin')->where('tenbaiviet','like','%'.$timkiem.'%')->get();
    	return view('home.seach')->with('search',$search)->with('vitri',$vitri);
    }
    public function chitiet($id){
        $dangtin = DB::table('tbl_dangtin')->where('hienthi','0')->paginate(2);
        $vitri = DB::table('tbl_vitri')->get();
        $loaiphong = DB::table('tbl_loaiphong')->get();
        $chitiet = DB::table('tbl_dangtin')->join('tbl_vitri','tbl_vitri.vitri_id','=','tbl_dangtin.vitri_id')->join('tbl_loaiphong','tbl_loaiphong.loaiphong_id','=','tbl_dangtin.loaiphong_id')->where('id',$id)->get();
    	return view('home.chitiet')->with('chitiet',$chitiet)->with('vitri',$vitri)->with('dangtin',$dangtin)->with('loaiphong',$loaiphong);
    }
    public function chitiettintuc($id){
        $chitiettintuc = DB::table('tbl_tintuc')->where('id',$id)->get();
        $tintuc = DB::table('tbl_tintuc')->orderby('id','desc')->paginate(6);
        $vitri = DB::table('tbl_vitri')->get();
    	return view('home.chitiettintuc')->with('chitiettintuc',$chitiettintuc)->with('tintuc',$tintuc);
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
            return Redirect::to('dang-tin');
        }
    	$data['image'] = '';
    	DB::table('tbl_dangtin')->insert($data);
    	session::put('message1','Thêm thành viên thành công!!');
        return Redirect::to('dang-tin');

    }
}
