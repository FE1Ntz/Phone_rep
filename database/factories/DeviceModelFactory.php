<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DeviceModel>
 */
class DeviceModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->randomElement(["Galaxy M32", "Galaxy M31", "Galaxy A32", "Galaxy A51", "Galaxy F12", "Galaxy F22", "Galaxy S22", "Galaxy A73 5G", "Galaxy S22+", "Galaxy S20 FE"])

        ];
    }
}
