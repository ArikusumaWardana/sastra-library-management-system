<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Loan;

class LoadDocument extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
      'loan_id',
      'file_path',
      'file_name',
    ];

    // Relations
    public function loan() {
      return $this->belongsTo(Loan::class);
    }
}
