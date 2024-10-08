<?php

namespace App\Services;

use App\Models\Book;
use App\Models\ReadCategory;
use Illuminate\Support\Facades\Storage;

class BookService
{
    public function upload($cover)
    {
        $coverName = $cover->hashName();
        $coverPath = 'uploads/users/' . $coverName;
        Storage::disk('s3')->put('/uploads/books/', $cover, 'public');

        return $coverPath;
    }
    public function create(int $name_id, int $age_limit_id, int $annotation_id, int $year_id, int $house_id, int $language_id, int $binding_id, int $type_id, string $ISBN, $cover)
    {
        if ($cover) {
            $path = BookService::upload($cover);
            $newBook = Book::create([
                'name_id' => $name_id,
                'age_id' => $age_limit_id,
                'annotation_id' => $annotation_id,
                'year_id' => $year_id,
                'house_id' => $house_id,
                'language_id' => $language_id,
                'binding_id' => $binding_id,
                'type_id' => $type_id,
                'ISBN' => $ISBN,
                'cover' => $path
            ]);
            return $path;
        } else {
            $newBook = Book::create([
                'name_id' => $name_id,
                'age_id' => $age_limit_id,
                'annotation_id' => $annotation_id,
                'year_id' => $year_id,
                'house_id' => $house_id,
                'language_id' => $language_id,
                'binding_id' => $binding_id,
                'type_id' => $type_id,
                'ISBN' => $ISBN
            ]);
            return $newBook;
        }
    }

    public function update(int $name_id, int $age_limit_id, int $annotation_id, int $year_id, int $house_id, int $language_id, int $binding_id, int $type_id, string $ISBN, $cover, int $id)
    {
        $updateBook = Book::findOrFail($id)->update([
            'name_id' => $name_id,
            'age_id' => $age_limit_id,
            'annotation_id' => $annotation_id,
            'year_id' => $year_id,
            'house_id' => $house_id,
            'language_id' => $language_id,
            'binding_id' => $binding_id,
            'type_id' => $type_id,
            'ISBN' => $ISBN
        ]);

        if ($cover) {
            $path = BookService::upload($cover);
            Book::findOrFail($id)->update([
                'cover' => $path,
            ]);

            error_log($path);
        }
        return $updateBook;
    }

    public function delete(int $bookId)
    {
        return Book::destroy($bookId);
    }

    public function update_read_category(int $userId, int $bookId, int $it_abandoned, int $it_read, int $it_want_read, int $it_now_read)
    {
        $category = ReadCategory::select('id')
            ->where('user_id', $userId)
            ->where('book_id', $bookId)->get()->first();

        if (!empty($category)) {
            $id = $category->id;
            $updateCategory = ReadCategory::findOrFail($id)->update([
                'it_abandoned' => $it_abandoned,
                'it_read' => $it_read,
                'it_want_read' => $it_want_read,
                'it_now_read' => $it_now_read,
            ]);
            return $updateCategory;
        } else {
            $newCategory = ReadCategory::create([
                'user_id' => $userId,
                'book_id' => $bookId,
                'it_abandoned' => $it_abandoned,
                'it_read' => $it_read,
                'it_want_read' => $it_want_read,
                'it_now_read' => $it_now_read,
            ]);
            return $newCategory;
        }
    }
}