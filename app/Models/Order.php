<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = "orders";
    protected $fillable = ["confirmed_by","is_active","created_by","updated_by"];
    public function User() {
        return $this->belongsTo(User::class,"user_id");
    }
    public function OrderStatus() {
        return $this->hasMany(OrderStatus::class,"order_id");
    }
}
