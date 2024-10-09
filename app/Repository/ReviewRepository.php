<?php

namespace App\Repository;
use App\Models\Review;
use Illuminate\Support\Facades\DB;


class ReviewRepository
{
    public function getAllReviews()
    {
        $reviews = DB::table('reviews')
        ->join('books', 'reviews.book_id', '=', 'books.id')
        ->join('name_books', 'books.name_id', '=', 'name_books.id')
        ->join('users', 'reviews.user_id', '=', 'users.id')
        ->select('users.login', 'reviews.name', 'reviews.text', 'name_books.name', 'books.cover', 'reviews.id', 'users.id as user_id')
        ->get();
        return $reviews;
    }

    public function getOneReview(int $id)
    {
        $review = DB::table('reviews')
        ->join('books', 'reviews.book_id', '=', 'books.id')
        ->join('name_books', 'books.name_id', '=', 'name_books.id')
        ->join('users', 'reviews.user_id', '=', 'users.id')
        ->select('users.login', 'reviews.name', 'reviews.text', 'name_books.name', 'books.cover', 'reviews.id', 'users.id as user_id')
        ->where('reviews.id', '=', $id)
        ->get()->first();
        return $review;
    }

    public function getUserReview($userId)
    {
        $userReview = DB::table('reviews')
        ->join('books', 'reviews.book_id', '=', 'books.id')
        ->join('name_books', 'books.name_id', '=', 'name_books.id')
        ->join('users', 'reviews.user_id', '=', 'users.id')
        ->select('users.login', 'reviews.name', 'reviews.text', 'name_books.name', 'books.cover', 'reviews.id', 'users.id as user_id', 'users.avatar', 'users.name as user_name', 'users.surname')
        ->where('user_id', '=', $userId)
        ->get();
        return $userReview;
    }
}

