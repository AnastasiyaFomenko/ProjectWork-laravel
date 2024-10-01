<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PublishingHouse extends Model
{
    use HasFactory;

    protected $table = 'publishing_houses';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'house'
    ];

    public function books(): HasMany {
        return $this->HasMany(Book::class);
    }
}
