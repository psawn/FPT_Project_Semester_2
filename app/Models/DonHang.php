<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    use HasFactory;
    protected $table = "don_hangs";
    protected $fillable = ["confirmed_by","is_active","created_by","updated_by"];
    public function User() {
        return $this->belongsTo(User::class,"id_user");
    }
}
