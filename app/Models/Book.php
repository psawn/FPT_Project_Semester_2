<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table = "books";
    protected $fillable = [
        "category_id ",
        "name",
        "description",
        "publisher",
        "publication_year",
        "noinhap",
        "created_by",
        "updated_by",
        "import_price",
        "price",
        "print_length",
        "image",
        "quantity",
        "is_active",
        "slug"
    ];
    public function Category() {
        return $this->belongsTo(Category::class,"category_id ");
    }
    public function PromotionBook() {
        return $this->hasMany(PromotionBook::class,"book_id");
    }
}
