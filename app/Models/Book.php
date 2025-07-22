<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Loan;
use App\Models\BookCategory;

class Book extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
      'book_title',
      'author',
      'publisher',
      'year_published',
      'book_genre',
      'book_description',
      'book_stock',
      'category_id',
    ];

    // Relations
    public function loans() {
      return $this->hasMany(Loan::class);
    }

    public function category() {
      return $this->belongsTo(Category::class);
    }
}
