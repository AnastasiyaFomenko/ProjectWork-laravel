<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagRequest;
use App\Models\Tag;
use App\Repository\TagRepository;
use App\Services\TagService;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(TagRepository $tagRepository)
    {
        $tags = $tagRepository->getAllTag();
        return view('pages.tags.list', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TagRequest $request, TagService $tagService)
    {
        $tag = $request->tag;
        $tagService->create($tag);

        return redirect()->route('tags.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        return view('pages.tags.show',compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        return view('pages.tags.edit',compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TagRequest $request, TagService $tagService, Tag $tag)
    {
        $updateTag = $request->tag;
        $id = $tag->id;
        $tagService->update($updateTag, $id);

        return redirect()->route('tags.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TagService $tagService, Tag $tag)
    {
        $tagService->delete($tag->id);

        return redirect()->route('tags.index');
    }
}
