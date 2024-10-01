<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ModerationStatus extends Model
{
    use HasFactory;

    protected $table = 'moderation_statuses';

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'status'
    ];

    public function reviews() : HasMany {
        return $this->HasMany(Review::class);
    }

    public function posts() : HasMany {
        return $this->HasMany(Post::class);
    }    
}
