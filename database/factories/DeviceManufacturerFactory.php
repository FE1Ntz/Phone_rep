<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DeviceManufacturer>
 */
class DeviceManufacturerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->randomElement(["Apple", "POCO", "VIVO", "OnePlus", "OPPO", "Samsung", "Xiaomi", "Huawei" , "LG", "Sony"])
        ];
    }
}
