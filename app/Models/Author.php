<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Author extends Model
{
    use HasFactory;

    protected $table = 'authors';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'book_id',
        'information_author_id'
    ];

    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }
    
    public function info(): BelongsTo
    {
        return $this->belongsTo(AuthorInformation::class);
    }
}
