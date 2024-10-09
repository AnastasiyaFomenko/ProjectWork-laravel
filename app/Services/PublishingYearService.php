<?php

namespace App\Services;
use App\Models\PublishingYear;

class PublishingYearService
{
    public function create(string $year)
    {
        $newYear = PublishingYear::create([
           'year' => $year
        ]);

        return $newYear;
    }

    public function update(string $year, int $id)
    {
        $updateYear= PublishingYear::findOrFail($id)->update([
           'year' => $year
        ]);
        return $updateYear;
    }

    public function delete(int $yearId)
    {
        return PublishingYear::destroy($yearId);
    }
}