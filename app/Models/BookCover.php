<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BookCover extends Model
{
    use HasFactory;

    protected $table = 'book_covers';

    protected $fillable = [
        'cover',
        'book_id'
    ];

    public function book() : BelongsTo {
        return $this->belongsTo(Book::class);
    }
}
