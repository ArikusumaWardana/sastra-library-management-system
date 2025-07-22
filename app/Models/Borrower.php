<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Loan;

class Borrower extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
      'full_name',
      'identity_number',
      'phone',
      'email',
      'address',
      'institution',
    ];

    // Relations
    public function loans() {
        return $this->hasMany(Loan::class);
    }

}
