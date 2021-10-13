<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Phone extends Model
{
    use HasFactory;

    protected $fillable = [
        'phone_number', 'user_id',
    ];

    //relación uno a uno
    public function user(): BelongsTo {
        return $this->belongsTo(User::class); 
    }
}
