<?php

namespace App\Http\Controllers;

use App\Http\Requests\BindingRequest;
use App\Models\Binding;
use App\Repository\BindingRepository;
use App\Services\BindingService;
use Illuminate\Http\Request;

class BindingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BindingRepository $bindingRepository)
    {
        $bindings = $bindingRepository->getAllBinding();
        return view('pages.bindings.list', compact('bindings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.bindings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BindingRequest $request, BindingService $bindingService)
    {
        $binding = $request->binding;
        $bindingService->create($binding);

        return redirect()->route('bindings.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Binding $binding)
    {
        return view('pages.bindings.show',compact('binding'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Binding $binding)
    {
        return view('pages.bindings.edit',compact('binding'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BindingRequest $request, BindingService $bindingService, Binding $binding)
    {
        $updateBinding = $request->binding;
        $id = $binding->id;
        $bindingService->update($updateBinding, $id);

        return redirect()->route('bindings.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BindingService $bindingService, Binding $binding)
    {
        $bindingService->delete($binding->id);

        return redirect()->route('bindings.index');
    }
}
