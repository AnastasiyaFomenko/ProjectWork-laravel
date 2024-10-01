<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TranslatorInformation extends Model
{
    use HasFactory;

    protected $table = 'information_translators';

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'surname',
        'patronymic'
    ];

    public function translators() : HasMany {
        return $this->HasMany(Translator::class);
    }
}
