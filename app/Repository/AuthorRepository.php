<?php

namespace App\Repository;
use App\Models\AuthorInformation;


class AuthorRepository
{
    public function getAuthors()
    {
        return AuthorInformation::all();
    }
}