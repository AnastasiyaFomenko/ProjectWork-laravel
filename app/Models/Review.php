<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
    use HasFactory;
    protected $table = 'reviews';

    /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
   protected $fillable = [
       'name',
       'text',
       'cover',
       'user_id',
       'book_id',
       'moderation_status_id'
   ];

   public function user() : BelongsTo {
       return $this->belongsTo(User::class);
   }

   public function book() : BelongsTo {
       return $this->belongsTo(Book::class);
   }

   public function status() : BelongsTo {
       return $this->belongsTo(ModerationStatus::class);
   }
}
