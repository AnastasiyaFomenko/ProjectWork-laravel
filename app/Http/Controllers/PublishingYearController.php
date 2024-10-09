<?php

namespace App\Http\Controllers;

use App\Http\Requests\PublishingYearRequest;
use App\Models\PublishingYear;
use App\Repository\PublishingYearRepository;
use App\Services\PublishingYearService;

class PublishingYearController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PublishingYearRepository $publishingYearRepository)
    {
        $publishing_years = $publishingYearRepository->getAllPublishingYear();
        return view('pages.publishing_years.list', compact('publishing_years'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.publishing_years.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PublishingYearRequest $request, PublishingYearService $publishingYearService)
    {
        $year = $request->year;
        $publishingYearService->create($year);

        return redirect()->route('publishing_years.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(PublishingYear $publishingYear)
    {
        return view('pages.publishing_years.show',compact('publishingYear'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PublishingYear $publishingYear)
    {
        return view('pages.publishing_years.edit',compact('publishingYear'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PublishingYearRequest $request, PublishingYearService $publishingYearService, PublishingYear $publishingYear)
    {
        $updateYear = $request->year;
        $id = $publishingYear->id;
        $publishingYearService->update($updateYear, $id);

        return redirect()->route('publishing_years.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PublishingYearService $publishingYearService, PublishingYear $publishingYear)
    {
        $publishingYearService->delete($publishingYear->id);

        return redirect()->route('publishing_years.index');
    }
}
