<?php

namespace App\Services;

use App\Models\Book;

class BookService
{
    public function create(int $name_id, int $age_limit_id, int $annotation_id, int $year_id, int $house_id, int $language_id, int $binding_id, int $type_id, string $ISBN)
    {
        $newBook = Book::create([
            'name_id' => $name_id,
            'age_limit_id' => $age_limit_id,
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

    public function update(int $name_id, int $age_limit_id, int $annotation_id, int $year_id, int $house_id, int $language_id, int $binding_id, int $type_id, string $ISBN, int $id)
    {
        $updateBook = Book::findOrFail($id)->update([
            'name_id' => $name_id,
            'age_limit_id' => $age_limit_id,
            'annotation_id' => $annotation_id,
            'year_id' => $year_id,
            'house_id' => $house_id,
            'language_id' => $language_id,
            'binding_id' => $binding_id,
            'type_id' => $type_id,
            'ISBN' => $ISBN
        ]);
        return $updateBook;
    }

    public function delete(int $bookId)
    {
        return Book::destroy($bookId);
    }
}