<?php

namespace Database\Seeders;

use App\Enum\StatusEnum;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Room Facilities',
                'status' => StatusEnum::ACTIVE->value
            ],
            [
                'name' => 'General Facilities',
                'status' => StatusEnum::ACTIVE->value
            ],
            [
                'name' => 'Outdoors Facilities',
                'status' => StatusEnum::ACTIVE->value
            ],
            [
                'name' => 'Wellness',
                'status' => StatusEnum::ACTIVE->value
            ],
            [
                'name' => 'Cleaning Services',
                'status' => StatusEnum::ACTIVE->value
            ],
            [
                'name' => 'Nearby',
                'status' => StatusEnum::ACTIVE->value
            ],
            [
                'name' => 'Safety & Security',
                'status' => StatusEnum::ACTIVE->value
            ],
        ];

        foreach ($categories as $category) {
            Category::insert($category);
        }
    }
}
