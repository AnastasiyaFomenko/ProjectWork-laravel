<?php

namespace App\Http\Controllers;

use App\Http\Requests\TranslatorRequest;
use Illuminate\Http\Request;
use App\Services\TranslatorService;
use App\Models\TranslatorInformation;
use App\Repository\TranslatorRepository;

class TranslatorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(TranslatorRepository $translatorRepository)
    {
        $translators = $translatorRepository->getTranslators();
        return view('pages.translators.list', compact('translators'));
    }

     /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.translators.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TranslatorRequest $request, TranslatorService $translatorService)
    {
        $name = $request->name;
        $surname = $request->surname;
        $patronymic = $request->patronymic;
        $translatorService->create($name, $surname, $patronymic);

        return redirect()->route('translators.index');
    }   

     /**
     * Display the specified resource.
     */
    public function show(TranslatorInformation $translator)
    {
        return view('pages.translators.show',compact('translator'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TranslatorInformation $translator)
    {
        return view('pages.translators.edit',compact('translator'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TranslatorRequest $request, TranslatorService $translatorService, TranslatorInformation $translator)
    {
        $name = $request->name;
        $surname = $request->surname;
        $patronymic = $request->patronymic;
        $id = $translator->id;
        $translatorService->update($name, $surname, $patronymic, $id);

        return redirect()->route('translators.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TranslatorService $translatorService, TranslatorInformation $translator)
    {
        $translatorService->delete($translator->id);
        return redirect()->route('translators.index');
    }
}
