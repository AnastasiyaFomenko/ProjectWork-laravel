<?php

namespace App\Repository;
use App\Models\Tag;


class TagRepository
{
    public function getAllTag()
    {
        return Tag::all();
    }
}

