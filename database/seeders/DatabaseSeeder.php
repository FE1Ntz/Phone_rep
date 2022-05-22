<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ClientSeeder::class);
        $this->call(DeviceManufacturerSeeder::class);
        //$this->call(DeviceModelSeeder::class);
        $this->call(PartManufacturerSeeder::class);
    }
}
