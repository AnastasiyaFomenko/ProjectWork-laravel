<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Annotation extends Model
{
    use HasFactory;

    protected $table = 'annotations';

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'annotation'
    ];

    public function books() : HasMany {
        return $this->HasMany(Book::class);
    }
}
