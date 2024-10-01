<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Type extends Model
{
    use HasFactory;

    protected $table = 'types';

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'type'
    ];

    public function books() : HasMany {
        return $this->HasMany(Book::class);
    }
}
