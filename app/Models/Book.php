<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'title', 'author', 'is_borrowed', 'photo'];
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
