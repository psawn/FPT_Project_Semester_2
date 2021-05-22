<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonHangOnline extends Model
{
    use HasFactory;
    protected $table = "donhang_online";
    protected $fillable = ["diachi","ngaytao","nguoiduyet","ngayduyet","trangthai","doanhthu","ghichu","phiship","nguoisua","ngaysua"];
    protected $dates = ['ngaytao','ngayduyet','ngaysua'];
}
