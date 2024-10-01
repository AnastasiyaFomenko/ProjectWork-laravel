<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BookGenre extends Model
{
    use HasFactory;

    protected $table = 'book_genres';

    protected $fillable = [
        'genre_id',
        'book_id'
    ];
    public function genre() : BelongsTo {
        return $this->belongsTo(Genre::class);
    }

    public function book() : BelongsTo {
        return $this->belongsTo(Book::class);
    }
}
