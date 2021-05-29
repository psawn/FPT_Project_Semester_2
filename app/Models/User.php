<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $table = "users";
    protected $fillable = ["username ","password","email","hoten","phone","created_at","updated_at"];
    public function DonHang(){
        return $this->hasMany(DonHang::class,"id_user");
    }
}
