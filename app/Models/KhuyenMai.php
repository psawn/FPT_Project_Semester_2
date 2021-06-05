<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhuyenMai extends Model
{
    use HasFactory;
    protected $table = "khuyen_mais";
    protected $fillable = ["tieude","phantramkhuyenmai","noidung","ngaybatdau","ngayketthuc","is_active","created_by","updated_by"];
    protected $dates = ['ngaybatdau','ngayketthuc'];
    public function KhuyenMaiSach() {
        return $this->hasMany(KhuyenMaiSach::class,"id_khuyenmai");
    }
}
