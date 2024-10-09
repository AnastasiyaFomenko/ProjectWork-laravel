<?php

namespace App\Repository;
use App\Models\BookLanguage;


class BookLanguageRepository
{
    public function getAllBookLanguage()
    {
        return BookLanguage::all();
    }
}

