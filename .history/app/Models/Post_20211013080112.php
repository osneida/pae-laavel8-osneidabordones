<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    //asignación masiva coloco los que no se guardaran con guarded
    protected $guarded = [
        'id', 'create_at', 'updated_at'
    ];
    
    //relacion uno a muchos inversa
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    //relacion muchos a muchos

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }


}
