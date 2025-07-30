<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Client::firstOrCreate([
            'user_id' => 01,
            'name'    => 'Adesya',
            'phone'   => '081234567890',
            'email'   => 'adesya@user.com',
            'address' => 'Pangkal Pinang',
        ]);

        Client::firstOrCreate([
            'user_id' => 02,
            'name'    => 'Gibraltar Putra',
            'phone'   => '081298765432',
            'email'   => 'gibraltar@user.com',
            'address' => 'Jakarta',
        ]);

        Client::firstOrCreate([
            'user_id' => 03,
            'name'    => 'Sinta Ayu',
            'phone'   => '085700112233',
            'email'   => 'sinta@user.com',
            'address' => 'Bandung',
        ]);

        Client::firstOrCreate([
            'user_id' => 04,
            'name'    => 'Rizky Pratama',
            'phone'   => '082211334455',
            'email'   => 'rizky@user.com',
            'address' => 'Surabaya',
        ]);
    }
}
