<?php

namespace App\Models;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReadCategory extends Model
{
    use HasFactory;

    protected $table = 'read_category';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'book_id',
        'it_abandoned',
        'it_read',
        'it_want_read', 
        'it_now_read'
    ];

    public function users() : HasMany {
        return $this->HasMany(User::class);
    }
    public function books(): HasMany {
        return $this->HasMany(Book::class);
    }
}
