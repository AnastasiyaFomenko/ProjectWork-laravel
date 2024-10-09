<?php

namespace App\Repository;
use App\Models\Book;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class BookRepository
{
    public function getAllBook()
    {
        return Book::with(['name', 'age', 'annotation', 'year', 'house', 'language', 'binding', 'type', 'authors', 'genres', 'tags', 'translators'])->get();
    }

    public function getReadBook($userId)
    {
        $readBook = DB::table('read_category')
        ->join('books', 'read_category.book_id', '=', 'books.id')
        ->join('name_books', 'books.name_id', '=', 'name_books.id')
        ->selectRaw('name_books.name, books.cover, books.id')
        ->where('it_read', '=', 1)
        ->where('user_id', '=', $userId)
        ->get();
        return $readBook;
    }

    public function getAbandonedBook($userId)
    {
        $readBook = DB::table('read_category')
        ->join('books', 'read_category.book_id', '=', 'books.id')
        ->join('name_books', 'books.name_id', '=', 'name_books.id')
        ->selectRaw('name_books.name, books.cover, books.id')
        ->where('it_abandoned', '=', 1)
        ->where('user_id', '=', $userId)
        ->get();
        return $readBook;
    }

    public function getWantReadBook($userId)
    {
        $readBook = DB::table('read_category')
        ->join('books', 'read_category.book_id', '=', 'books.id')
        ->join('name_books', 'books.name_id', '=', 'name_books.id')
        ->selectRaw('name_books.name, books.cover, books.id')
        ->where('it_want_read', '=', 1)
        ->where('user_id', '=', $userId)
        ->get();
        return $readBook;
    }

    public function getNowReadBook($userId)
    {
        $readBook = DB::table('read_category')
        ->join('books', 'read_category.book_id', '=', 'books.id')
        ->join('name_books', 'books.name_id', '=', 'name_books.id')
        ->selectRaw('name_books.name, books.cover, books.id')
        ->where('it_now_read', '=', 1)
        ->where('user_id', '=', $userId)
        ->get();
        return $readBook;
    }
}