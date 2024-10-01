<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PublishingYear extends Model
{
    use HasFactory;

    protected $table = 'publishing_years';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'year'
    ];

    public function books(): HasMany {
        return $this->HasMany(Book::class);
    }
}
