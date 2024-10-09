<?php

namespace App\Services;
use App\Models\BookLanguage;

class BookLanguageService
{
    public function create(string $bookLanguage)
    {
        $newBookLanguage = BookLanguage::create([
           'language' => $bookLanguage
        ]);

        return $newBookLanguage;
    }

    public function update(string $bookLanguage, int $id)
    {
        $updateBookLanguage = BookLanguage::findOrFail($id)->update([
           'language' => $bookLanguage
        ]);

        return $updateBookLanguage;
    }

    public function delete(int $bookLanguageId)
    {
        return BookLanguage::destroy($bookLanguageId);
    }
}