<?php

namespace App\Repository;
use App\Models\PublishingHouse;


class PublishingHouseRepository
{
    public function getAllPublishingHouse()
    {
        return PublishingHouse::all();
    }
}

