<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'cover',
        'text',
        'user_id',
        'moderation_status_id'
    ];

    public function status() : BelongsTo {
        return $this->belongsTo(ModerationStatus::class);
    }
    
    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }
}
