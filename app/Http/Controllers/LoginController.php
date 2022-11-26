<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\Social;
use App\Models\Thanhvien;
use Socialite;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class LoginController extends Controller
{
    public function savedangky(Request $request)
    {
    	$data = array();
    	$data['loai_id'] = $request->loaithanhvien_use;
        $data['tenthanhvien'] = $request->tenthanhvien;
        $data['email'] = $request->email;
        $data['password'] = md5($request->password);
        $data['dienthoai'] = $request->dienthoai;
        $data['diachi'] = $request->diachi;
        $data['content'] = 'content';
    	$data['image'] = 'them.png';

    	DB::table('tbl_thanhvien')->insert($data);
    	session::put('message1','Thêm thành viên thành công!!');
        return Redirect::to('/dang-nhap');

    }
    public function dangnhap(Request $request)
    {
        $email = $request->email;
        $password = md5($request->password);

        $result = DB::table('tbl_thanhvien')->where('email',$email)->where('password',$password)->first();
         
        if($result) {
    		Session::put('tenthanhvien',$result->tenthanhvien);
            Session::put('hinhanh',$result->image);
    		Session::put('customer_id',$result->id);
    		return Redirect::to('/');
    	}
    	else{
    		Session::put('dangnhap','Email hoặc mật khẩu không đúng');
    		return Redirect::to('/dang-nhap');
    	}

    }
    public function dangxuat(Request $request)
    {
        Session::flush();
        return Redirect::to('/');
    }
    public function login_facebook(){
        config( ['services.Facebook.redirect' => env('FACEBOOK_CLIENT_REDIRECT')] );
        return Socialite::driver('facebook')->redirect();
    }

    public function callback_facebook(){
        config(['services.Facebook.redirect' => env('FACEBOOK_CLIENT_REDIRECT')]);
        $provider = Socialite::driver('facebook')->user();
        $account = Social::where('provider','facebook')->where('provider_user_id',$provider->getId())->first();
       
        if($account != NULL){
            //login in vao trang quan tri  
            $account_name = Thanhvien::where('id',$account->user)->first();
            Session::put('id',$account_name->id);
            Session::put('tenthanhvien',$account_name->tenthanhvien);
            return redirect('/dang-nhap')->with('message', 'Đăng nhập Admin thành công');
        }
        elseif($account == NULL){
            $kiet = new Social([
                'provider_user_id' => $provider->getId(),
                'provider_user_email' => $provider->getEmail(),
                'provider' => 'facebook'
            ]);

            $thanhvien = Thanhvien::where('email',$provider->getEmail())->first();

            if(! $thanhvien){
                 $thanhvien = Thanhvien::create([
                    'tenthanhvien' => $provider->getName(),
                    'email' => $provider->getEmail(),
                    'password' => 'Null',
                    'loai_id' => '1',
                    'phone' => '',
                    'diachi' => 'Null',
                    'image' => 'Null',
                    'content' => 'Null'
                    
                ]);
            }
            $kiet->thanhvien()->associate($thanhvien);
            $kiet->save();

            $account_name = Thanhvien::where('id',$account->user)->first();
            Session::put('tenthanhvien',$account_name->tenthanhvien);
            Session::put('id',$account_name->id);
            return redirect('/')->with('message', 'Đăng nhập Admin thành công');
        } 
    }
}
