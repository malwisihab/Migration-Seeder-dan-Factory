<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Cast;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cast>
 */
class CastFactory extends Factory
{

    protected $model = Cast::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'bio' => $this->faker->paragraph,
            'dob' => $this->faker->date('Y-m-d'),
            'gender' => $this->faker->randomElement(['male', 'female']),
            'photo' => $this->faker->imageUrl(200, 300, 'people'),
            'nationality' => $this->faker->country,
            'awards' => $this->faker->word,
        ];
    }
}
