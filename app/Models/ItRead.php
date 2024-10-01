<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ItRead extends Model
{
    use HasFactory;

    protected $table = 'it_reads';

    protected $fillable = [
        'user_id',
        'book_id'
    ];

    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }
    public function book() : BelongsTo {
        return $this->belongsTo(Book::class);
    }
}
