<?php

namespace App\Repository;
use App\Models\Binding;


class BindingRepository
{
    public function getAllBinding()
    {
        return Binding::all();
    }
}
