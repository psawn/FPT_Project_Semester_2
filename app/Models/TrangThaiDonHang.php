<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrangThaiDonHang extends Model
{
    use HasFactory;
    protected $table = "trang_thai_don_hangs";
    protected $fillable = ["id_donhang","trangthai","confirmed_by","confirmed_at"];
    public $timestamps = false;
    public function DonHang() {
        return $this->belongsTo(DonHang::class,"id_donhang");
    }
}
