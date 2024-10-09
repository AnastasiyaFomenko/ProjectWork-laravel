<?php

namespace App\Repository;
use App\Models\PublishingYear;


class PublishingYearRepository
{
    public function getAllPublishingYear()
    {
        return PublishingYear::all();
    }
}

