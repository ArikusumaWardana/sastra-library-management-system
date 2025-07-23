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
        'borrower_id',
        'book_id', 
        'processed_by',
        'loan_date',
        'return_date',
        'status',
    ];

    protected $casts = [
        'loan_date' => 'date',
        'return_date' => 'date',
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
