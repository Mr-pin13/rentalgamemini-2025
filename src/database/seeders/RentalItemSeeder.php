<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Console as GameConsole;
use App\Models\Game;
use App\Models\Rental;
use App\Models\RentalItem;
use Illuminate\Database\Seeder;

class RentalItemSeeder extends Seeder
{
    public function run(): void
    {
        $clients  = Client::pluck('id', 'name');
        $consoles = GameConsole::pluck('id', 'name');
        $games    = Game::pluck('id', 'title');

        if ($clients->isEmpty()) {
            $this->command->warn('No clients found. Please seed clients first.');
            return;
        }
        if ($consoles->isEmpty()) {
            $this->command->warn('No consoles found. Please seed consoles first.');
            return;
        }
        if ($games->isEmpty()) {
            $this->command->warn('No games found. Please seed games first.');
            return;
        }

        $rentalItemsByRental = [
            [
                'client_name' => 'Adesya',
                'start_at'    => '2025-07-28 10:00:00',
                'items'       => [[
                    'console_name' => 'Mini NES',            'game_title' => null,                  'hours' => 2, 'qty' => 1,
                    'console_name' => null,                  'game_title' => 'Super Mario Bros.',   'hours' => 2, 'qty' => 1,
                ]],
            ],
            [
                'client_name' => 'Gibraltar Putra',
                'start_at'    => '2025-07-29 15:00:00',
                'items'       => [
                    // Konsol PlayStation Classic, 3 jam
                    ['console_name' => 'PlayStation Classic', 'game_title' => null,                  'hours' => 3, 'qty' => 1],
                    // Game Gran Turismo, 3 jam
                    ['console_name' => null,                  'game_title' => 'Gran Turismo',        'hours' => 3, 'qty' => 1],
                ],
            ],
        ];

        foreach ($rentalItemsByRental as $cfg) {
            $clientId = $clients[$cfg['client_name']] ?? null;

            if (!$clientId) {
                $this->command->warn("Client '{$cfg['client_name']}' not found. Skipped.");
                continue;
            }

            // Cari rental header sesuai client & start_at (dibuat di RentalSeeder)
            $rental = Rental::where('client_id', $clientId)
                ->where('start_at', $cfg['start_at'])
                ->first();

            if (!$rental) {
                $this->command->warn("Rental for '{$cfg['client_name']}' at {$cfg['start_at']} not found. Run RentalSeeder first.");
                continue;
            }

            $total = 0;

            foreach ($cfg['items'] as $it) {
                $consoleId = $it['console_name'] ? ($consoles[$it['console_name']] ?? null) : null;
                $gameId    = $it['game_title']  ? ($games[$it['game_title']]     ?? null) : null;

                if (!$consoleId && !$gameId) {
                    $this->command->warn("Item skipped for rental {$cfg['start_at']}: console/game not found.");
                    continue;
                }

                // Ambil harga per jam dari entitas terkait
                $pricePerHour = 0;
                if ($consoleId) {
                    $pricePerHour = (float) (GameConsole::find($consoleId)?->hourly_rate ?? 0);
                } elseif ($gameId) {
                    $pricePerHour = (float) (Game::find($gameId)?->hourly_rate ?? 0);
                }

                $hours    = (int) ($it['hours'] ?? 1);
                $qty      = (int) ($it['qty']   ?? 1);
                $subtotal = $pricePerHour * $hours * $qty;
                $total   += $subtotal;

                // Upsert item (idempotent seperti ProductSeeder yang update stok)
                RentalItem::updateOrCreate(
                    [
                        'rental_id'  => $rental->id,
                        'console_id' => $consoleId,
                        'game_id'    => $gameId,
                    ],
                    [
                        'quantity'       => $qty,
                        'hours'          => $hours,
                        'price_per_hour' => $pricePerHour,
                        'subtotal'       => $subtotal,
                    ]
                );
            }

            // (Opsional) sinkronkan total rental berdasarkan item
            $rental->update(['total' => $total]);
        }
    }
}
