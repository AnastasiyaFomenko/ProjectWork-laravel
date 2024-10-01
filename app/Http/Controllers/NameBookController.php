<?php

namespace App\Http\Controllers;

use App\Models\NameBook;
use App\Services\NameBookService;
use App\Http\Requests\NameBookRequest;
use App\Repository\NameBooksRepository;

class NameBookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(NameBooksRepository $nameBooksRepository)
    {
        $name_books = $nameBooksRepository->getAllNameBook();
        return view('pages.name_books.list', compact('name_books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.name_books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NameBookRequest $request, NameBookService $nameBookService)
    {
        $newName = $request->name;
        $nameBookService->create($newName);

        return redirect()->route('name_books.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(NameBook $nameBook)
    {
        return view('pages.name_books.show',compact('nameBook'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NameBook $nameBook)
    {
        return view('pages.name_books.edit',compact('nameBook'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NameBookRequest $request, NameBookService $nameBookService, NameBook $nameBook)
    {
        $updateName = $request->name;
        $id = $nameBook->id;
        $nameBookService->update($updateName, $id);

        return redirect()->route('name_books.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NameBook $nameBook, NameBookService $nameBookService)
    {
        $nameBookService->delete($nameBook->id);

        return redirect()->route('name_books.index');
    }
}