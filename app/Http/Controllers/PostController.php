<?php

namespace App\Http\Controllers;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Services\PostService;
use App\Repository\PostRepository;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdateStatusPostRequest;



class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Post $post, PostRepository $postRepository)
    {
        $posts = $postRepository->getPostsWithAuthor();
        return view('pages.posts.list', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreatePostRequest $request, PostService $postService)
    {
        $name = $request->name;
        $text = $request->text;
        $userId= $request->user_id;
        $cover = $request->file('cover');
        $coverPath = $postService->upload($cover);
        $postService->create($name, $text,  $coverPath , $userId);
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('pages.posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('pages.posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, PostService $postService, Post $post)
    {
        $name = $request->name;
        $text = $request->text;
        $cover = $request->file('cover');
        $id = $post->id;
        $postService->update($id, $name, $text, $cover);
        return redirect()->route('posts.index');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        
    }

    public function update_status(Post $post, PostService $postService, UpdateStatusPostRequest $request ) {

        $postService->update_moderate_status($post->id, $request->moderation_status_id);
        return redirect()->route('posts.show', compact('post'));
    }
}