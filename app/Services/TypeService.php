<?php

namespace App\Services;
use App\Models\Type;

class TypeService
{
    public function create(string $type)
    {
        $newType = Type::create([
           'type' => $type
        ]);

        return $newType;
    }

    public function update(string $type, int $id)
    {
        $updateType = Type::findOrFail($id)->update([
           'type' => $type
        ]);
        return $updateType;
    }

    public function delete(int $typeId)
    {
        return Type::destroy($typeId);
    }
}