<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Console as GameConsole;
use App\Models\Game;
use App\Models\Rental;
use App\Models\RentalItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RentalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // --- Ambil ID client ---
        $adesyaId    = Client::where('name', 'Adesya')->value('id');
        $gibraltarId = Client::where('name', 'Gibraltar Putra')->value('id');

        // --- Ambil konsol ---
        $miniNes     = GameConsole::where('name', 'Mini NES')->first();
        $psClassic   = GameConsole::where('name', 'PlayStation Classic')->first();

        // --- Ambil game ---
        $smb   = Game::where('title', 'Super Mario Bros.')->first();
        $gt    = Game::where('title', 'Gran Turismo')->first();

        // ------- RENTAL #1: Adesya (Mini NES + SMB) 2 jam, returned -------
        if ($adesyaId && $miniNes && $smb) {
            $start1 = '2025-07-28 10:00:00';
            $end1   = '2025-07-28 12:00:00';

            $rental1 = Rental::updateOrCreate(
                ['client_id' => $adesyaId, 'start_at' => $start1],
                [
                    'end_at' => $end1,
                    'status' => 'returned',
                    'total'  => 0,
                    'notes'  => 'Seeder: Adesya sewa Mini NES + SMB',
                ]
            );

            // Item 1: Konsol
            $hours1 = 2;
            $qty1   = 1;
            $pph1   = (float) $miniNes->hourly_rate;
            $sub1   = $pph1 * $hours1 * $qty1;

            RentalItem::updateOrCreate(
                ['rental_id' => $rental1->id, 'console_id' => $miniNes->id, 'game_id' => null],
                [
                    'quantity'       => $qty1,
                    'hours'          => $hours1,
                    'price_per_hour' => $pph1,
                    'subtotal'       => $sub1,
                ]
            );

            // Item 2: Game
            $hours2 = 2;
            $qty2   = 1;
            $pph2   = (float) $smb->hourly_rate;
            $sub2   = $pph2 * $hours2 * $qty2;

            RentalItem::updateOrCreate(
                ['rental_id' => $rental1->id, 'console_id' => null, 'game_id' => $smb->id],
                [
                    'quantity'       => $qty2,
                    'hours'          => $hours2,
                    'price_per_hour' => $pph2,
                    'subtotal'       => $sub2,
                ]
            );

            // Update total
            $rental1->update(['total' => $sub1 + $sub2]);
        }

        // ------- RENTAL #2: Gibraltar (PS Classic + Gran Turismo) 3 jam, returned -------
        if ($gibraltarId && $psClassic && $gt) {
            $start2 = '2025-07-29 15:00:00';
            $end2   = '2025-07-29 18:00:00';

            $rental2 = Rental::updateOrCreate(
                ['client_id' => $gibraltarId, 'start_at' => $start2],
                [
                    'end_at' => $end2,
                    'status' => 'returned',
                    'total'  => 0,
                    'notes'  => 'Seeder: Gibraltar sewa PS Classic + Gran Turismo',
                ]
            );

            // Item 1: Konsol
            $hours3 = 3;
            $qty3   = 1;
            $pph3   = (float) $psClassic->hourly_rate;
            $sub3   = $pph3 * $hours3 * $qty3;

            RentalItem::updateOrCreate(
                ['rental_id' => $rental2->id, 'console_id' => $psClassic->id, 'game_id' => null],
                [
                    'quantity'       => $qty3,
                    'hours'          => $hours3,
                    'price_per_hour' => $pph3,
                    'subtotal'       => $sub3,
                ]
            );

            // Item 2: Game
            $hours4 = 3;
            $qty4   = 1;
            $pph4   = (float) $gt->hourly_rate;
            $sub4   = $pph4 * $hours4 * $qty4;

            RentalItem::updateOrCreate(
                ['rental_id' => $rental2->id, 'console_id' => null, 'game_id' => $gt->id],
                [
                    'quantity'       => $qty4,
                    'hours'          => $hours4,
                    'price_per_hour' => $pph4,
                    'subtotal'       => $sub4,
                ]
            );

            // Update total
            $rental2->update(['total' => $sub3 + $sub4]);
        }
    }
}
