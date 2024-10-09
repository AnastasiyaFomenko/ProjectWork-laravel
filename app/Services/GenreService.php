<?php

namespace App\Services;
use App\Models\Genre;

class GenreService
{
    public function create(string $genre)
    {
        $newGenre = Genre::create([
           'genre' => $genre
        ]);

        return $newGenre;
    }

    public function update(string $genre, int $id)
    {
        $updateGenre= Genre::findOrFail($id)->update([
           'genre' => $genre
        ]);
        return $updateGenre;
    }

    public function delete(int $genreId)
    {
        return Genre::destroy($genreId);
    }
}