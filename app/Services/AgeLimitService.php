<?php

namespace App\Services;
use App\Models\AgeLimit;


class AgeLimitService
{
    public function create(string $age)
    {
        $newAgeLimit = AgeLimit::create([
           'age' => $age
        ]);

        return $newAgeLimit;
    }

    public function update(string $age, int $id)
    {
        $updateAgeLimit = AgeLimit::findOrFail($id)->update([
           'age' => $age
        ]);

        return $updateAgeLimit;
    }

    public function delete(int $ageId)
    {
        return AgeLimit::destroy($ageId);
    }
}