<?php

namespace App\Services;

use App\Models\Hotel;

class HotelService
{
    public function store(array $data): Hotel
    {
        return Hotel::create($data);
    }
}
