<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;
    protected $table = "promotions";
    protected $fillable = ["title","percentage","content","start_date","end_date","is_active","created_by","updated_by"];
    protected $dates = ['start_date','end_date'];
    public function PromotionBook() {
        return $this->hasMany(PromotionBook::class,"promotion_id");
    }
}
