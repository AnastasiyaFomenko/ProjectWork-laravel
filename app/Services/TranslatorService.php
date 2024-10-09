<?php

namespace App\Services;

use App\Models\AuthorInformation;
use App\Models\Book;
use App\Models\TranslatorInformation;
use Illuminate\Support\Facades\Storage;

class TranslatorService
{
    public function create(string $name, $surname, $patronymic)
    {
        $newTranslator = TranslatorInformation::create([
            'name' => $name,
            'surname' => $surname,
            'patronymic' => $patronymic
        ]);
        return $newTranslator;

    }

    public function update(string $name, $surname, $patronymic, int $id)
    {
        $updateTranslator = TranslatorInformation::findOrFail($id)->update([
            'name' => $name,
            'surname' => $surname,
            'patronymic' => $patronymic
        ]);
        return $updateTranslator;
    }

    public function delete(int $translatorId)
    {
        return TranslatorInformation::destroy($translatorId);
    }
}