<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthorRequest;
use App\Models\AuthorInformation;
use App\Repository\AuthorRepository;
use App\Services\AuthorService;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(AuthorRepository $authorRepository)
    {
        $authors = $authorRepository->getAuthors();
        return view('pages.authors.list', compact('authors'));
    }

     /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.authors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AuthorRequest $request, AuthorService $authorService)
    {
        $name = $request->name;
        $surname = $request->surname;
        $patronymic = $request->patronymic;
        $biography = $request->biography;
        $birth = $request->birth;
        $place_birth = $request->place_birth;
        $cover = $request->file('cover');
        $authorService->create($name, $surname, $patronymic, $biography, $birth, $place_birth, $cover);

        return redirect()->route('authors.index');
    }   

     /**
     * Display the specified resource.
     */
    public function show(AuthorInformation $author)
    {
        return view('pages.authors.show',compact('author'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AuthorInformation $author)
    {
        return view('pages.authors.edit',compact('author'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AuthorRequest $request, AuthorService $authorService, AuthorInformation $author)
    {
        $name = $request->name;
        $surname = $request->surname;
        $patronymic = $request->patronymic;
        $biography = $request->biography;
        $birth = $request->birth;
        $place_birth = $request->place_birth;
        $id = $author->id;
        $cover = $request->file('cover');
        $authorService->update($name, $surname, $patronymic, $biography, $birth, $place_birth, $cover, $id);

        return redirect()->route('authors.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AuthorService $authorService, AuthorInformation $author)
    {
        $authorService->delete($author->id);
        return redirect()->route('authors.index');
    }

}
