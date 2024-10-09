<?php

namespace App\Repository;
use App\Models\User;


class UserRepository
{ 
    public function getUserData(string $id)
    {
        $user = User::all()->where('id', '=', $id)->first();
        return $user;
    }
}