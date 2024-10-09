<?php

namespace App\Http\Controllers;
use App\Http\Requests\AgeLimitRequest;
use App\Models\AgeLimit;
use App\Repository\AgeLimitRepository;
use App\Services\AgeLimitService;

class AgeLimitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(AgeLimitRepository $ageLimitRepository)
    {
        $age_limits = $ageLimitRepository->getAllAgeLimit();
        return view('pages.age_limits.list', compact('age_limits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.age_limits.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AgeLimitRequest $request, AgeLimitService $ageLimitService)
    {
        $age = $request->age;
        $ageLimitService->create($age);

        return redirect()->route('age_limits.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(AgeLimit $ageLimit)
    {
        return view('pages.age_limits.show',compact('ageLimit'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AgeLimit $ageLimit)
    {
        return view('pages.age_limits.edit',compact('ageLimit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AgeLimitRequest $request, AgeLimitService $ageLimitService, AgeLimit $ageLimit)
    {
        $age = $request->age;
        $id = $ageLimit->id;
        $ageLimitService->update($age, $id);

        return redirect()->route('age_limits.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AgeLimit $ageLimit, AgeLimitService $ageLimitService)
    {
        $ageLimitService->delete($ageLimit->id);

        return redirect()->route('age_limits.index');
    }
}
