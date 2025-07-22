<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\Borrower;
use App\Models\Book;

class Loan extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
      'user_id',
      'book_id',
      'loan_date',
      'return_date',
      'status',
    ];
    

    // Relations
    public function borrower() {
        return $this->belongsTo(Borrower::class);
    }

    public function book() {
        return $this->belongsTo(Book::class);
    }

    public function processedBy() {
        return $this->belongsTo(User::class, 'processed_by');
    }

}
