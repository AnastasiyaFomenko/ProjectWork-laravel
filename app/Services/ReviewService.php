<?php

namespace App\Services;
use App\Models\Review;

class ReviewService
{
    public function create(string $name, string $text, int $userId, int $bookId)
    {
        $newReview =Review::create([
           'name' => $name,
           'text' => $text,
           'user_id' => $userId,
           'book_id' => $bookId 

        ]);
        return $newReview;
    }

    public function update(string $name, string $text, int $userId, int $bookId, int $id)
    {
        $updateReview= Review::findOrFail($id)->update([
            'name' => $name,
            'text' => $text,
            'user_id' => $userId,
            'book_id' => $bookId 
        ]);
        return $updateReview;
    }

    public function delete(int $reviewId)
    {
        return Review::destroy($reviewId);
    }
}