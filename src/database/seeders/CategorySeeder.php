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
        Category::firstOrCreate([
            'name' => 'Action',
            'slug' => 'action',
        ]);

        Category::firstOrCreate([
            'name' => 'Adventure',
            'slug' => 'adventure',
        ]);

        Category::firstOrCreate([
            'name' => 'RPG',
            'slug' => 'rpg',
        ]);

        Category::firstOrCreate([
            'name' => 'Racing',
            'slug' => 'racing',
        ]);

        Category::firstOrCreate([
            'name' => 'Sports',
            'slug' => 'sports',
        ]);

        Category::firstOrCreate([
            'name' => 'Fighting',
            'slug' => 'fighting',
        ]);

        Category::firstOrCreate([
            'name' => 'Puzzle',
            'slug' => 'puzzle',
        ]);
    }
}
