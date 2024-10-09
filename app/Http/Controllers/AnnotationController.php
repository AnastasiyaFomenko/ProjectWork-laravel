<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnnotationRequest;
use App\Models\Annotation;
use App\Repository\AnnotationRepository;
use App\Services\AnnotationService;

class AnnotationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(AnnotationRepository $annotationRepository)
    {
        $annotations = $annotationRepository->getAllAnnotation();
        return view('pages.annotations.list', compact('annotations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.annotations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AnnotationRequest $request, AnnotationService $annotationService)
    {
        $annotation = $request->annotation;
        $annotationService->create($annotation);

        return redirect()->route('annotations.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Annotation $annotation)
    {
        return view('pages.annotations.show',compact('annotation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Annotation $annotation)
    {
        return view('pages.annotations.edit',compact('annotation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AnnotationRequest $request, AnnotationService $annotationService, Annotation $annotation)
    {
        $updateAnnotation = $request->annotation;
        $id = $annotation->id;
        $annotationService->update($updateAnnotation, $id);

        return redirect()->route('annotations.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AnnotationService $annotationService, Annotation $annotation)
    {
        $annotationService->delete($annotation->id);

        return redirect()->route('annotations.index');
    }
}
