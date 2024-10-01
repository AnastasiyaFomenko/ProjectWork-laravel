<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NameBook extends Model
{
    use HasFactory;

    protected $table = 'name_books';

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name'
    ];

    public function books() : HasMany {
        return $this->HasMany(Book::class);
    }
}
