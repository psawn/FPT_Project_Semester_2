<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    use HasFactory;
    protected $table = "order_status";
    protected $fillable = ["order_id ","status","confirmed_by","confirmed_at"];
    public $timestamps = false;
    public function Order() {
        return $this->belongsTo(Order::class,"order_id");
    }
}
