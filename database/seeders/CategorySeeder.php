<?php

namespace Database\Seeders;

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
                'status' => Category::ACTIVE
            ],
            [
                'name' => 'General Facilities',
                'status' => Category::ACTIVE
            ],
            [
                'name' => 'Outdoors Facilities',
                'status' => Category::ACTIVE
            ],
            [
                'name' => 'Wellness',
                'status' => Category::ACTIVE
            ],
            [
                'name' => 'Cleaning Services',
                'status' => Category::ACTIVE
            ],
            [
                'name' => 'Nearby',
                'status' => Category::ACTIVE
            ],
            [
                'name' => 'Safety & Security',
                'status' => Category::ACTIVE
            ],
        ];

        foreach ($categories as $category) {
            Category::insert($category);
        }
    }
}
