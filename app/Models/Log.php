<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class Log extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
      'user_id',
      'action',
    ];

    // Relations
    public function user() {
      return $this->belongsTo(User::class);
    }
}
