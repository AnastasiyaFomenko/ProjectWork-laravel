<?php

namespace App\Repository;
use App\Models\Book;


class BookRepository
{
    public function getAllBook()
    {
        return Book::with(['name', 'age', 'annotation', 'year', 'house', 'language', 'binding', 'type', 'covers', 'authors', 'genres', 'tags', 'translators'])->get();
    }
}