<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromotionBook extends Model
{
    use HasFactory;
    protected $table = "promotions_books";
    protected $fillable = ["book_id","promotion_id","is_active","created_by","updated_by"];
    public function Book() {
        return $this->belongsTo(Book::class,"book_id");
    }
    public function Promotion() {
        return $this->belongsTo(Promotion::class,"promotion_id");
    }
    
}
