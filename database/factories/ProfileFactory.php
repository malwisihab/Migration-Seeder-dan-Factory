<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Profile;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Tentukan model yang digunakan untuk factory ini.
     */
    protected $model = Profile::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'biodata' => $this->faker->paragraph, 
            'age' => $this->faker->numberBetween(18, 60), 
            'address' => $this->faker->address, 
            'avatar' => $this->faker->imageUrl(200, 200, 'people', true, 'avatar'), // Gambar avatar
            'user_id' => User::factory(), 
        ];
    }
}
