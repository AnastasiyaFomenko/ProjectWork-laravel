<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;

    protected $table = 'books';

    protected $fillable = [
        'name_id',
        'age_id',
        'annotation_id',
        'year_id',
        'house_id',
        'language_id',
        'binding_id',
        'type_id',
        'ISBN'
    ];

    public function name() : BelongsTo {
        return $this->belongsTo(NameBook::class);
    }

    public function age() : BelongsTo {
        return $this->belongsTo(AgeLimit::class);
    }

    public function annotation() : BelongsTo {
        return $this->belongsTo(Annotation::class);
    }
    
    public function year() : BelongsTo {
        return $this->belongsTo(PublishingYear::class);
    }

    public function house() : BelongsTo {
        return $this->belongsTo(PublishingHouse::class);
    }

    public function language() : BelongsTo {
        return $this->belongsTo(BookLanguage::class);
    }

    public function binding() : BelongsTo {
        return $this->belongsTo(Binding::class);
    }

    public function type() : BelongsTo {
        return $this->belongsTo(Type::class);
    }

    public function covers() : HasMany {
        return $this->HasMany(BookCover::class);
    }

    public function authors() : HasMany {
        return $this->HasMany(Author::class);
    }

    public function genres() : HasMany {
        return $this->HasMany(BookGenre::class);
    }

    public function tags() : HasMany {
        return $this->HasMany(BookTag::class);
    }

    public function translators() : HasMany {
        return $this->HasMany(Translator::class);
    }
}
