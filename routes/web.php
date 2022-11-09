<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//admin 
Route::get('/admin','AdminController@index');
Route::get('/dashboard', 'AdminController@show_admin');
Route::get('/logout', 'AdminController@log_out');
Route::post('/admin-login', 'AdminController@dashboard');

Route::get('/list-admin', 'AdminController@showadmin');
Route::post('/save-admin', 'AdminController@saveadmin');
Route::post('/update-admin/{admin_id}', 'AdminController@updateadmin');
Route::get('/delete-admin/{admin_id}', 'AdminController@deleteadmin');
Route::get('/edit-admin/{admin_id}', 'AdminController@editadmin');
Route::post('/tim-admin', 'AdminController@searchadmin');


//loai phòng
Route::get('/list-loaiphong', 'LoaiPhongController@showloaiphong');
Route::post('/save-loaiphong', 'LoaiPhongController@saveLoaiPhong');
Route::post('/update-loaiphong/{loai_id}', 'LoaiPhongController@updateLoaiPhong');
Route::get('/delete-loaiphong/{loai_id}', 'LoaiPhongController@deleteLoaiPhong');
Route::get('/edit-loaiphong/{loai_id}', 'LoaiPhongController@editLoaiPhong');
Route::post('/tim-loaiphong', 'LoaiPhongController@searchloaiphong');

//dangtin
Route::get('/list-dangtin', 'DangTinController@showDangTin');
Route::post('/save-dangtin', 'DangTinController@saveDangTin');
Route::post('/update-dangtin/{id}', 'DangTinController@updateDangTin');
Route::get('/delete-dangtin/{id}', 'DangTinController@deleteDangTin');
Route::get('/edit-dangtin/{id}', 'DangTinController@editDangTin');


//loai phòng
Route::get('/list-loaithanhvien', 'LoaiThanhVienController@showloaithanhvien');
Route::post('/save-loaithanhvien', 'LoaiThanhVienController@saveloaithanhvien');
Route::post('/update-loaithanhvien/{loai_id}', 'LoaiThanhVienController@updateloaithanhvien');
Route::get('/delete-loaithanhvien/{loai_id}', 'LoaiThanhVienController@deleteloaithanhvien');
Route::get('/edit-loaithanhvien/{loai_id}', 'LoaiThanhVienController@editloaithanhvien');
Route::post('/tim-loaithanhvien', 'LoaiThanhVienController@searchloaithanhvien');

//Vi trí
Route::get('/list-vitri', 'ViTriController@showvitri');
Route::post('/save-vitri', 'ViTriController@savevitri');
Route::post('/update-vitri/{loai_id}', 'ViTriController@updatevitri');
Route::get('/delete-vitri/{loai_id}', 'ViTriController@deletevitri');
Route::get('/edit-vitri/{loai_id}', 'ViTriController@editvitri');
Route::post('/tim-vitri', 'ViTriController@searchvitri');

//Thanh viên
Route::get('/list-thanhvien', 'ThanhVienController@showthanhvien');
Route::get('/add-thanhvien', 'ThanhVienController@addthanhvien');
Route::post('/save-thanhvien', 'ThanhVienController@savethanhvien');
Route::post('/update-thanhvien/{id}', 'ThanhVienController@updatethanhvien');
Route::get('/delete-thanhvien/{id}', 'ThanhVienController@deletethanhvien');
Route::get('/edit-thanhvien/{id}', 'ThanhVienController@editthanhvien');
Route::post('/tim-thanhvien', 'ThanhVienController@searchthanhvien');

//TinTuc
Route::get('/list-tintuc', 'TinTucController@showtintuc');
Route::get('/add-tintuc', 'TinTucController@addtintuc');
Route::post('/save-tintuc', 'TinTucController@savetintuc');
Route::post('/update-tintuc/{id}', 'TinTucController@updatetintuc');
Route::get('/delete-tintuc/{id}', 'TinTucController@deletetintuc');
Route::get('/edit-tintuc/{id}', 'TinTucController@edittintuc');
Route::post('/tim-tintuc', 'TinTucController@searchtintuc');

//Liên hệ
Route::get('/list-lienhe', 'lienheController@showlienhe');
Route::post('/update-lienhe/{id}', 'lienheController@updatelienhe');
Route::get('/delete-lienhe/{id}', 'lienheController@deletelienhe');
Route::get('/edit-lienhe/{id}', 'lienheController@editlienhe');