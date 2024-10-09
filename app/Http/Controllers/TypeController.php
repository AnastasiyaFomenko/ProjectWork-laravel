<?php

namespace App\Http\Controllers;

use App\Http\Requests\TypeRequest;
use App\Models\Type;
use App\Repository\TypeRepository;
use App\Services\TypeService;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(TypeRepository $typeRepository)
    {
        $types = $typeRepository->getAllType();
        return view('pages.types.list', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TypeRequest $request, TypeService $typeService)
    {
        $type = $request->type;
        $typeService->create($type);

        return redirect()->route('types.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Type $type)
    {
        return view('pages.types.show',compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
        return view('pages.types.edit',compact('type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TypeRequest $request, TypeService $typeService, Type $type)
    {
        $updateType = $request->type;
        $id = $type->id;
        $typeService->update($updateType, $id);

        return redirect()->route('types.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TypeService $typeService, Type $type)
    {
        $typeService->delete($type->id);

        return redirect()->route('types.index');
    }
}
