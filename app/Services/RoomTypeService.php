<?php

namespace App\Services;

use App\Models\RoomType;

class RoomTypeService
{
    public function store(array $contacts): RoomType
    {
        return RoomType::create($contacts);
    }

    public function find(int $id): RoomType
    {
        return RoomType::find($id);
    }

    public function delete(int $id)
    {
        return RoomType::destroy($id);
    }
}
