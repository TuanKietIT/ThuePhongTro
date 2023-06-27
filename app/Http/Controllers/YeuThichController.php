<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use Cart;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class YeuThichController extends Controller
{
    public function saveyeuthich(Request $request){
       $quantity = $request->qty;
       $dangtinId = $request->dangtinid_hidden;
       $dangtin_info = DB::table('tbl_dangtin')->where('id',$dangtinId)->first();

        $data['id'] = $dangtin_info->id;
        $data['qty'] = $quantity;
        $data['name'] = $dangtin_info->tieude;
        $data['price'] = $dangtin_info->gia;
        $data['weight'] = $dangtin_info->gia;
        $data['options']['image'] = $dangtin_info->image;
        Cart::add($data);
        return Redirect::to('/yeu-thich');
    }
    public function yeuthich(){
        $loaiphong = DB::table('tbl_loaiphong')->get();
        $vitri = DB::table('tbl_vitri')->get();
        $data = DB::table('tbl_dangtin')->get();
        return view('home.yeuthich')->with('vitri',$vitri)->with('loaiphong',$loaiphong);
     }
     public function deleteyeuthich($rowId){
        Cart::update($rowId,0);
        return Redirect::to('/yeu-thich');
    }
    public function updateyeuthich(Request $request){
        $rowId = $request->rowId_cart;
        $qty = $request->cart_quantity;
        Cart::update($rowId,$qty);
        return Redirect::to('/yeu-thich');
    }
}
