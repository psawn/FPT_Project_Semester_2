<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sach extends Model
{
    use HasFactory;
    protected $table = "saches";
    protected $fillable = [
        "id_danhmuc",
        "tensach",
        "tentacgia",
        "nhaxuatban",
        "namxuatban",
        "noinhap",
        "created_by",
        "updated_by",
        "gianhap",
        "giaban",
        "tap",
        "anhdaidien",
        "soluong",
        "is_active"];
    public function DanhMuc() {
        return $this->belongsTo(DanhMuc::class,"id_danhmuc");
    }
    public function KhuyenMaiSach() {
        return $this->hasMany(KhuyenMaiSach::class,"id_sach");
    }
}
