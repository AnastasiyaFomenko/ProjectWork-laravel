<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Book;
use App\Repository\BookRepository;
use App\Services\BookService;

class BookController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index(BookRepository $bookRepository)
    {
        $books = $bookRepository->getAllBook();
        return view('pages.books.list', compact('books'));
    }

     /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookRequest $request, BookService $bookService)
    {
        $nameId = $request->name_id;
        $ageLimitId = $request->age_limit_id;
        $annotationId = $request->annotation_id;
        $yearId = $request->year_id;
        $houseId = $request->house_id;
        $languageId = $request->language_id; 
        $bindingId = $request->binding_id;
        $typeId = $request->type_id;
        $ISBN = $request->ISBN;
        $bookService->create($nameId, $ageLimitId, $annotationId, $yearId, $houseId, $languageId, $bindingId, $typeId, $ISBN);

        return redirect()->route('books.index');
    }   

     /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('pages.books.show',compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('pages.books.edit',compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookRequest $request, BookService $bookService, Book $book)
    {
        $nameId = $request->name_id;
        $ageLimitId = $request->age_limit_id;
        $annotationId = $request->annotation_id;
        $yearId = $request->year_id;
        $houseId = $request->house_id;
        $languageId = $request->language_id; 
        $bindingId = $request->binding_id;
        $typeId = $request->type_id;
        $ISBN = $request->ISBN;
        $id = $book->id;
        $bookService->update($nameId, $ageLimitId, $annotationId, $yearId, $houseId, $languageId, $bindingId, $typeId, $ISBN, $id);
        
        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BookService $bookService, Book $book)
    {
        $bookService->delete($book->id);
        return redirect()->route('books.index');
    }
}
