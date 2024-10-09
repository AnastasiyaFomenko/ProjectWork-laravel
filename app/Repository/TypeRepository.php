<?php

namespace App\Repository;
use App\Models\Type;


class TypeRepository
{
    public function getAllType()
    {
        return Type::all();
    }
}

