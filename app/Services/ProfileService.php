<?php

namespace App\Services;
use UploadFiles;
use App\Models\User;
use Illuminate\Support\Facades\Storage;


class ProfileService
{
    public function upload($avatar)
    {
        $avatarName = $avatar->hashName();
        $coverPath = 'uploads/users/' . $avatarName;
        Storage::disk('s3')->put('/uploads/users/', $avatar, 'public');

        return $coverPath;
    }
    
    public function update(string $surname, string $name,  $birth, string $experiens, string $about_user, $avatar, int $id)
    {
        $updateProfile = User::findOrFail($id)->update([
           'surname' => $surname,
           'name' => $name,
           'birth' => $birth,
           'experiens' => $experiens,
           'about_user' => $about_user,
        ]);

        if ($avatar) {
            $path = ProfileService::upload($avatar);
            User::findOrFail($id)->update([
                'avatar' => $path,
            ]);
        }

        return $updateProfile;
    }
}