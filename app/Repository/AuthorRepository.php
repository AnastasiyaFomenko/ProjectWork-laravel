<?php

namespace App\Repository;
use App\Models\AuthorInformation;
use App\Models\Book;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class AuthorRepository
{
    public function getAuthors()
    {
        return AuthorInformation::all();
    }
}