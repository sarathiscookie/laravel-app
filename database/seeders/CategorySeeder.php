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
                'status' => 'active'
            ],
            [
                'name' => 'General Facilities',
                'status' => 'active'
            ],
            [
                'name' => 'Outdoors Facilities',
                'status' => 'active'
            ],
            [
                'name' => 'Wellness',
                'status' => 'active'
            ],
            [
                'name' => 'Cleaning Services',
                'status' => 'active'
            ],
            [
                'name' => 'Nearby',
                'status' => 'active'
            ],
            [
                'name' => 'Safety & Security',
                'status' => 'active'
            ],
        ];

        foreach ($categories as $category) {
            Category::insert($category);
        }
    }
}
