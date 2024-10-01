<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;

    protected $table = 'tags';

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'tag'
    ];

    public function bookTags() : HasMany {
        return $this->HasMany(BookTag::class);
    }
}
