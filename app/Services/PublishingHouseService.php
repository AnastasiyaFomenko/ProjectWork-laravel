<?php

namespace App\Services;
use App\Models\PublishingHouse;

class PublishingHouseService
{
    public function create(string $house)
    {
        $newHouse = PublishingHouse::create([
           'house' => $house
        ]);

        return $newHouse;
    }

    public function update(string $house, int $id)
    {
        $updateHouse= PublishingHouse::findOrFail($id)->update([
           'house' => $house
        ]);
        return $updateHouse;
    }

    public function delete(int $houseId)
    {
        return PublishingHouse::destroy($houseId);
    }
}