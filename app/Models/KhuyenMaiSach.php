<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhuyenMaiSach extends Model
{
    use HasFactory;
    protected $table = "khuyen_mai_saches";
    protected $fillable = ["id_sach","id_khuyenmai","is_active","created_by","updated_by"];
    public function Sach() {
        return $this->belongsTo(Sach::class,"id_sach");
    }
    public function KhuyenMai() {
        return $this->belongsTo(KhuyenMai::class,"id_khuyenmai");
    }
    
}
