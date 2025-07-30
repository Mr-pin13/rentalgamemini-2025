<?php

namespace Database\Seeders;

use App\Models\Console as GameConsole;
use Illuminate\Database\Seeder;

class ConsoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GameConsole::firstOrCreate([
            'name'           => 'Mini NES',
            'manufacturer'   => 'Nintendo',
            'serial_number'  => 'NES-001',
            'image'          => null,
            'hourly_rate'    => 15000,
            'status'         => 'available',
        ]);

        GameConsole::firstOrCreate([
            'name'           => 'RetroPie Box',
            'manufacturer'   => 'Custom',
            'serial_number'  => 'RPI-101',
            'image'          => null,
            'hourly_rate'    => 12000,
            'status'         => 'available',
        ]);

        GameConsole::firstOrCreate([
            'name'           => 'PlayStation Classic',
            'manufacturer'   => 'Sony',
            'serial_number'  => 'PSC-777',
            'image'          => null,
            'hourly_rate'    => 18000,
            'status'         => 'available',
        ]);

        GameConsole::firstOrCreate([
            'name'           => 'Sega Genesis Mini',
            'manufacturer'   => 'SEGA',
            'serial_number'  => 'SGM-555',
            'image'          => null,
            'hourly_rate'    => 16000,
            'status'         => 'available',
        ]);
    }
}
