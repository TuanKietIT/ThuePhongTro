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
    public function showDangTin()
    {
        $this->AuthLoGin();
    	$dangtin = DB::table('tbl_dangtin')->get();
    	$menagedangtin = view('admin.dangtin')->with('dangtin',$dangtin);
    	return view('admin_layout')->with('admin.dangtin',$menagedangtin);
    }
}
