<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thanhvien extends Model
{
    use HasFactory;
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'tenthanhvien','loai_id', 'email', 'password','dienthoai','diachi', 'image', 'content'
    ];
    protected $primaryKey = 'id';
 	protected $table = 'tbl_thanhvien'; 
}
