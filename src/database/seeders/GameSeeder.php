<?php

namespace Database\Seeders;

use App\Models\Game;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $actionId    = Category::where('slug', 'action')->value('id');
        $adventureId = Category::where('slug', 'adventure')->value('id');
        $rpgId       = Category::where('slug', 'rpg')->value('id');
        $racingId    = Category::where('slug', 'racing')->value('id');
        $sportsId    = Category::where('slug', 'sports')->value('id');
        $fightingId  = Category::where('slug', 'fighting')->value('id');
        $puzzleId    = Category::where('slug', 'puzzle')->value('id');

        Game::firstOrCreate([
            'category_id'  => $actionId,
            'title'        => 'Super Mario Bros.',
            'publisher'    => 'Nintendo',
            'release_year' => 1985,
            'image'        => null,
            'description'  => null,
            'stock'        => 2,
            'hourly_rate'  => 5000,
        ]);

        Game::firstOrCreate([
            'category_id'  => $adventureId,
            'title'        => 'The Legend of Zelda',
            'publisher'    => 'Nintendo',
            'release_year' => 1986,
            'image'        => null,
            'description'  => null,
            'stock'        => 1,
            'hourly_rate'  => 6000,
        ]);

        Game::firstOrCreate([
            'category_id'  => $fightingId,
            'title'        => 'Street Fighter II',
            'publisher'    => 'Capcom',
            'release_year' => 1991,
            'image'        => null,
            'description'  => null,
            'stock'        => 2,
            'hourly_rate'  => 7000,
        ]);

        Game::firstOrCreate([
            'category_id'  => $actionId,
            'title'        => 'Sonic the Hedgehog',
            'publisher'    => 'SEGA',
            'release_year' => 1991,
            'image'        => null,
            'description'  => null,
            'stock'        => 2,
            'hourly_rate'  => 5000,
        ]);

        Game::firstOrCreate([
            'category_id'  => $racingId,
            'title'        => 'Gran Turismo',
            'publisher'    => 'Sony Interactive Entertainment',
            'release_year' => 1997,
            'image'        => null,
            'description'  => null,
            'stock'        => 1,
            'hourly_rate'  => 8000,
        ]);

        Game::firstOrCreate([
            'category_id'  => $sportsId,
            'title'        => 'FIFA 21',
            'publisher'    => 'EA Sports',
            'release_year' => 2020,
            'image'        => null,
            'description'  => null,
            'stock'        => 2,
            'hourly_rate'  => 9000,
        ]);
    }
}
