<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Services\ProfileService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

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
}
