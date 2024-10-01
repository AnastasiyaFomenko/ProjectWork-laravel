<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BookTag extends Model
{
    use HasFactory;

    protected $table = 'book_tags';

    protected $fillable = [
        'tag_id',
        'book_id'
    ];
    public function tag() : BelongsTo {
        return $this->belongsTo(Tag::class);
    }

    public function book() : BelongsTo {
        return $this->belongsTo(Book::class);
    }
}
