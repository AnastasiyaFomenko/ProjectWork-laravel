<?php

namespace App\Repository;
use App\Models\Genre;


class GenreRepository
{
    public function getAllGenre()
    {
        return Genre::all();
    }
}

