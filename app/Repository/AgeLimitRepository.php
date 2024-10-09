<?php

namespace App\Repository;
use App\Models\AgeLimit;


class AgeLimitRepository
{
    public function getAllAgeLimit()
    {
        return AgeLimit::all();
    }
}