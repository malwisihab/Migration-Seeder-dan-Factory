<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Movie;
use App\Models\Cast;
use App\Models\CastMovie;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CastMovie>
 */
class CastMovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'movie_id' => Movie::factory(), // Relasi ke film
            'cast_id' => Cast::factory(), // Relasi ke aktor/aktris
        ];
    }
}
