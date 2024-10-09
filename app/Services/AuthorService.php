<?php

namespace App\Services;

use App\Models\AuthorInformation;
use App\Models\Book;
use Illuminate\Support\Facades\Storage;

class AuthorService
{
    public function upload($cover)
    {
        $coverName = $cover->hashName();
        $coverPath = 'uploads/authors/' . $coverName;
        Storage::disk('s3')->put('/uploads/authors/', $cover, 'public');

        return $coverPath;
    }
    public function create(string $name, $surname, $patronymic, $biography, $birth, $place_birth, $cover)
    {
        if ($cover) {
            $path = AuthorService::upload($cover);
            $newAuthor = AuthorInformation::create([
                'name' => $name,
                'surname' => $surname,
                'patronymic' => $patronymic,
                'biography' => $biography,
                'birth' => $birth,
                'place_birth' => $place_birth,
                'cover' => $path
            ]);
            return $path;
        } else {
            $newAuthor = AuthorInformation::create([
                'name' => $name,
                'surname' => $surname,
                'patronymic' => $patronymic,
                'biography' => $biography,
                'birth' => $birth,
                'place_birth' => $place_birth,
            ]);
            return $newAuthor;
        }
    }

    public function update(string $name, $surname, $patronymic, $biography, $birth, $place_birth, $cover, int $id)
    {
        $updateAuthor = AuthorInformation::findOrFail($id)->update([
            'name' => $name,
            'surname' => $surname,
            'patronymic' => $patronymic,
            'biography' => $biography,
            'birth' => $birth,
            'place_birth' => $place_birth
        ]);

        if ($cover) {
            $path = AuthorService::upload($cover);
            Book::findOrFail($id)->update([
                'cover' => $path,
            ]);

            error_log($path);
        }
        return $updateAuthor;
    }

    public function delete(int $authorId)
    {
        return AuthorInformation::destroy($authorId);
    }
}