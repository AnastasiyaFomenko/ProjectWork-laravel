<?php

namespace App\Repository;
use App\Models\Review;
use Illuminate\Support\Facades\DB;


class ReviewRepository
{
    public function getAllReview()
    {
        return Review::all();
    }

    public function getUserReview($userId)
    {
        $userReview = DB::table('review')
        ->join('books', 'review.book_id', '=', 'books.id')
        ->join('name_books', 'books.name_id', '=', 'name_books.id')
        ->join('users', 'review.user_id', '=', 'users.id')
        ->select('users.login', 'review.name', 'review.text', 'books.name', 'books.cover')
        ->where('user_id', '=', $userId)
        ->get();
        return $userReview;
    }
}

