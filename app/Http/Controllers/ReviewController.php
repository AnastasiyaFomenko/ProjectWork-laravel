<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Services\ReviewService;
use App\Http\Requests\ReviewRequest;
use App\Repository\ReviewRepository;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ReviewRepository $reviewRepository)
    {
        $reviews = $reviewRepository->getAllReview();
        return view('pages.reviews.list', compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.reviews.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReviewRequest $request, ReviewService $reviewService)
    {
        $name = $request->name;
        $text = $request->text;
        $user_id = Auth::user()->id;
        $book_id = $request->book_id;
        $reviewService->create($name, $text, $user_id, $book_id);

        return redirect()->route('reviews.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        return view('pages.reviews.show',compact('review'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        return view('pages.reviews.edit',compact('review'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ReviewRequest $request, ReviewService $reviewService, Review $review)
    {
        $name = $request->name;
        $text = $request->text;
        $user_id = Auth::user()->id;
        $book_id = $request->book_id;
        $id = $review->id;
        $reviewService->update($name, $text, $user_id, $book_id, $id);

        return redirect()->route('reviews.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ReviewService $reviewService, Review $review)
    {
        $reviewService->delete($review->id);

        return redirect()->route('reviews.index');
    }
}
