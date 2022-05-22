<?php

namespace Database\Seeders;

use App\Models\PartManufacturer;
use Illuminate\Database\Seeder;

class PartManufacturerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $manufacturers = [
            "Qualcomm",
            "Mediatek",
            "Samsung",
            "Huawei",
            "Apple",
            "Intel",
            "AMD",
            "Nvidia",
            "Sony",
            "LG",
            'Xiaomi'
        ];

        foreach ($manufacturers as $manufacturer) {
            PartManufacturer::factory()->create(['name' => $manufacturer]);
        }
    }
}
