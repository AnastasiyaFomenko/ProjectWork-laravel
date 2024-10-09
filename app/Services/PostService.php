<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostService
{
    public function update_moderate_status(int $id, int $status_id)
    {
        $updateStatus = Post::findOrFail($id)->update([
            'moderation_status_id' => $status_id
        ]);

        return $updateStatus;
    }

    public function create(string $name, string $text, string $cover, int $userId)
    {
        $updateStatus = Post::create([
            'name' => $name,
            'text' => $text,
            'cover' => $cover,
            'user_id' => $userId,
            'moderation_status_id' => '1'
        ]);

        return $updateStatus;
    }

    public function upload($cover)
    {
        $coverName = $cover->hashName();
        $coverPath = 'uploads/posts/' . $coverName;
        Storage::disk('s3')->put('/uploads/posts/', $cover, 'public');

        return $coverPath;
    }

    public function update(int $id, string $name, string $text, $cover)
    {
        Post::findOrFail($id)->update([
            'name' => $name,
            'text' => $text,
        ]);

        if ($cover) {
            $path = PostService::upload($cover);
            Post::findOrFail($id)->update([
                'cover' => $path,
            ]);
        }
    }

    public function delete(int $postId)
    {
        return Post::destroy($postId);
    }
}