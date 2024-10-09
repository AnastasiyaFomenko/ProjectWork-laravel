<?php

namespace App\Services;
use App\Models\Binding;

class BindingService
{
    public function create(string $binding)
    {
        $newBinding = Binding::create([
           'binding' => $binding
        ]);

        return $newBinding;
    }

    public function update(string $binding, int $id)
    {
        $updateBinding = Binding::findOrFail($id)->update([
           'binding' => $binding
        ]);

        return $updateBinding;
    }

    public function delete(int $bindingId)
    {
        return Binding::destroy($bindingId);
    }
}