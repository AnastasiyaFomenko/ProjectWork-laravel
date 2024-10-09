<?php

namespace App\Repository;
use App\Models\TranslatorInformation;


class TranslatorRepository
{
    public function getTranslators()
    {
        return TranslatorInformation::all();
    }
}