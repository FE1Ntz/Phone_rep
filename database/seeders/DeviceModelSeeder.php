<?php

namespace Database\Seeders;

use App\Models\DeviceModel;
use Illuminate\Database\Seeder;

class DeviceModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DeviceModel::factory(10)->create();
    }
}
