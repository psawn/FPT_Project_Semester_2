<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $table = "users";
    protected $fillable = ["email ","password","name","profile_photo_path","created_at","updated_at"];
    public function Order(){
        return $this->hasMany(Order::class,"user_id");
    }
}
