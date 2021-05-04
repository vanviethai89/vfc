<?php


namespace App\Service;


use App\Http\Requests\CreatePrayerRequest;

class PrayerService
{
    public function createPrayer(CreatePrayerRequest $request)
    {
        // @todo: validate

        $request->only([
            'title',
            'content',
            'owner_name'
        ]);
    }
}
