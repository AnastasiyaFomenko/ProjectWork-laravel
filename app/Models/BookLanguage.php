<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BookLanguage extends Model
{
    use HasFactory;

    protected $table = 'book_languages';

    protected $fillable = [
        'language'
    ];

    public function books() : HasMany {
        return $this->HasMany(Book::class);
    }
}
