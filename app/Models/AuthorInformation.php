<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AuthorInformation extends Model
{
    use HasFactory;

    protected $table = 'information_authors';

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'surname',
        'patronymic',
        'biography',
        'birth',
        'cover', 
        'place_birth'
    ];
    
    public function authors() : HasMany {
        return $this->HasMany(Author::class);
    }
}
