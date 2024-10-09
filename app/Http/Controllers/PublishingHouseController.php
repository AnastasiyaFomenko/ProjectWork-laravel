<?php

namespace App\Http\Controllers;

use App\Http\Requests\PublishingHouseRequest;
use App\Models\PublishingHouse;
use App\Repository\PublishingHouseRepository;
use App\Services\PublishingHouseService;
use Illuminate\Http\Request;

class PublishingHouseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PublishingHouseRepository $publishingHouseRepository)
    {
        $publishing_houses = $publishingHouseRepository->getAllPublishingHouse();
        return view('pages.publishing_houses.list', compact('publishing_houses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.publishing_houses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PublishingHouseRequest $request, PublishingHouseService $publishingHouseService)
    {
        $house = $request->house;
        $publishingHouseService->create($house);

        return redirect()->route('publishing_houses.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(PublishingHouse $publishingHouse)
    {
        return view('pages.publishing_houses.show',compact('publishingHouse'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PublishingHouse $publishingHouse)
    {
        return view('pages.publishing_houses.edit',compact('publishingHouse'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PublishingHouseRequest $request, PublishingHouseService $publishingHouseService, PublishingHouse $publishingHouse)
    {
        $updateHouse = $request->house;
        $id = $publishingHouse->id;
        $publishingHouseService->update($updateHouse, $id);

        return redirect()->route('publishing_houses.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PublishingHouseService $publishingHouseService, PublishingHouse $publishingHouse)
    {
        $publishingHouseService->delete($publishingHouse->id);

        return redirect()->route('publishing_houses.index');
    }
}
