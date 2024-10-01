<?php

namespace App\Services;

use App\Models\NameBook;

class NameBookService
{
    public function create(string $name)
    {
        $newNameBook = NameBook::create([
           'name' => $name
        ]);

        return $newNameBook;
    }

    public function update(string $name, int $id)
    {
        $updateNameBook = NameBook::findOrFail($id)->update([
           'name' => $name
        ]);

        return $updateNameBook;
    }

    public function delete(int $nameBookId)
    {
        return NameBook::destroy($nameBookId);
    }
}