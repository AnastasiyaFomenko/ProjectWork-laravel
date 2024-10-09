<?php

namespace App\Services;
use App\Models\Tag;

class TagService
{
    public function create(string $tag)
    {
        $newTag = Tag::create([
           'tag' => $tag
        ]);

        return $tag;
    }

    public function update(string $tag, int $id)
    {
        $updateTag = Tag::findOrFail($id)->update([
           'tag' => $tag
        ]);
        return $updateTag;
    }

    public function delete(int $tagId)
    {
        return Tag::destroy($tagId);
    }
}