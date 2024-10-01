<?php

namespace App\Repository;
use App\Models\NameBook;


class NameBooksRepository
{
    public function getAllNameBook()
    {
        return NameBook::all();
    }
}