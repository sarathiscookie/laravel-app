<?php

namespace App\Services;

use App\Models\HotelContact;

class HotelContactService
{
    public function store(array $contacts): HotelContact
    {
        return HotelContact::create($contacts);
    }

    public function find(int $id): HotelContact
    {
        return HotelContact::find($id);
    }
}
