<?php

namespace Database\Seeders;

use App\Models\Game;
use App\Models\Console;
use Illuminate\Database\Seeder;

class ConsoleGameSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil consoles
        $ps4    = Console::where('name', 'PlayStation 4')->first();
        $ps5    = Console::where('name', 'PlayStation 5')->first();
        $switch = Console::where('name', 'Nintendo Switch')->first();
        $xone   = Console::where('name', 'Xbox One')->first();

        // Ambil games
        $mk8    = Game::where('title', 'Mario Kart 8')->first();
        $zelda  = Game::where('title', 'The Legend of Zelda: BOTW')->first();
        $fifa   = Game::where('title', 'FIFA 23')->first();
        $gow    = Game::where('title', 'God of War')->first();
        $spidey = Game::where('title', 'Marvels Spider-Man')->first();
        $forza  = Game::where('title', 'Forza Horizon 4')->first();
        $acnh   = Game::where('title', 'Animal Crossing: New Horizons')->first();

        // Helper untuk attach aman (tidak duplikat)
        $attach = function ($console, $game) {
            if ($console && $game) {
                $console->games()->syncWithoutDetaching([$game->id]);
            }
        };

        // Switch
        $attach($switch, $mk8);
        $attach($switch, $zelda);
        $attach($switch, $acnh);

        // PlayStation
        $attach($ps4, $gow);
        $attach($ps4, $spidey);
        $attach($ps4, $fifa);

        $attach($ps5, $gow);
        $attach($ps5, $spidey);
        $attach($ps5, $fifa);

        // Xbox
        $attach($xone, $forza);
        $attach($xone, $fifa);
    }
}
