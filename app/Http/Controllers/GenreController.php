<?php

namespace App\Http\Controllers;

use App\Http\Requests\GenreRequest;
use App\Models\Genre;
use App\Repository\GenreRepository;
use App\Services\GenreService;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(GenreRepository $genreRepository)
    {
        $genres = $genreRepository->getAllGenre();
        return view('pages.genres.list', compact('genres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.genres.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GenreRequest $request, GenreService $genreService)
    {
        $genre = $request->genre;
        $genreService->create($genre);

        return redirect()->route('genres.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Genre $genre)
    {
        return view('pages.genres.show',compact('genre'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Genre $genre)
    {
        return view('pages.genres.edit',compact('genre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GenreRequest $request, GenreService $genreService, Genre $genre)
    {
        $updateGenre = $request->genre;
        $id = $genre->id;
        $genreService->update($updateGenre, $id);

        return redirect()->route('genres.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GenreService $genreService, Genre $genre)
    {
        $genreService->delete($genre->id);

        return redirect()->route('genres.index');
    }
}
