<?php

namespace App\Repository;
use App\Models\Post;


class PostRepository
{
    public function getAllPost()
    {
        return Post::all();
    }

    public function getPostsWithAuthor()
    {
        return Post::with('user')->get();
    }

    public function getPostsWithModeration(int $status_id) {
        return Post::with('user')->where([
            'moderation_status_id' => $status_id
         ])->get();
    }

    public function getAllPostUser(int $userId)
    {
        return Post::all()->where('user_id', '=', $userId);
    }
}