<?php

namespace App\Http\Controllers;
use App\Http\Requests\BookLanguageRequest;
use App\Models\BookLanguage;
use App\Repository\BookLanguageRepository;
use App\Services\BookLanguageService;


class BookLanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BookLanguageRepository $bookLanguageRepository)
    {
        $languages = $bookLanguageRepository->getAllBookLanguage();
        return view('pages.book_languages.list', compact('languages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.book_languages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookLanguageRequest $request, BookLanguageService $bookLanguageService)
    {
        $language = $request->language;
        $bookLanguageService->create($language );

        return redirect()->route('book_languages.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(BookLanguage $bookLanguage)
    {
        return view('pages.book_languages.show',compact('bookLanguage'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BookLanguage $bookLanguage)
    {
        return view('pages.book_languages.edit',compact('bookLanguage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookLanguageRequest $request, BookLanguageService $bookLanguageService, BookLanguage $bookLanguage)
    {
        $updateLanguage = $request->language;
        $id = $bookLanguage->id;
        $bookLanguageService->update($updateLanguage, $id);

        return redirect()->route('book_languages.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BookLanguageService $bookLanguageService, BookLanguage $bookLanguage)
    {
        $bookLanguageService->delete($bookLanguage->id);

        return redirect()->route('book_languages.index');
    }
}
