<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Services\ProfileService;
use App\Repository\BookRepository;
use App\Repository\PostRepository;
use App\Repository\UserRepository;
use App\Repository\ReviewRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{

    public function show(Request $request): View
    {
        return view('pages.profile.profile');
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('pages.profile.edit');
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request, ProfileService $profileService): RedirectResponse
    {
        $surname = $request->surname;
        $name = $request->name;
        $birth = $request->birth;
        $experiens = $request->experiens;
        $about_user = $request->about_user;
        $avatar = $request->file('avatar');
        $id = Auth::user()->id;
        $profileService->update($surname, $name, $birth, $experiens, $about_user, $avatar, $id);       

        return redirect()->route('profile.show', ['profile' => Auth::user()->id]);
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }


    public function user_profile(UserRepository $userRepository, User $user)
    {
        $user = $userRepository->getUserData($user->id);
        return view('pages.user.user_profile', compact('user'));
    }

    public function user_review(UserRepository $userRepository, ReviewRepository $reviewRepository, User $user)
    {
        $user = $userRepository->getUserData($user->id);
        $reviews = $reviewRepository->getUserReview($user->id);
        return view('pages.user.review_profile', compact('user', 'reviews'));
    }

    public function user_read_books(BookRepository $bookRepository, UserRepository $userRepository, User $user) {
        $user = $userRepository->getUserData($user->id);
        $books = $bookRepository->getReadBook($user->id);
        return view('pages.user.read_books_profile', compact('user', 'books'));
    }

    public function user_abandoned_books(BookRepository $bookRepository, UserRepository $userRepository, User $user) {
        $user = $userRepository->getUserData($user->id);
        $books = $bookRepository->getAbandonedBook($user->id);
        return view('pages.user.abandoned_books_profile', compact('user','books'));
    }

    public function user_now_read_books(BookRepository $bookRepository, UserRepository $userRepository, User $user) {
        $user = $userRepository->getUserData($user->id);
        $books = $bookRepository->getNowReadBook($user->id);
        return view('pages.user.now_read_books_profile', compact('user', 'books'));
    }

    public function user_want_read_books(BookRepository $bookRepository, UserRepository $userRepository, User $user) {
        $user = $userRepository->getUserData($user->id);
        $books = $bookRepository->getWantReadBook($user->id);
        return view('pages.user.want_read_books_profile', compact('user',  'books'));
    }

    public function user_posts(PostRepository $postRepository, UserRepository $userRepository, User $user) {

        $user = $userRepository->getUserData($user->id);
        $posts = $postRepository->getPostsUser($user->id);
        return view('pages.user.user_profile_posts', compact('user', 'posts'));
    }

}
