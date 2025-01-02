<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Review;
use App\Models\Movie;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    protected $model = Review::class;

    public function definition(): array
    {
        return [
            'review' => $this->faker->paragraph,
            'rating' => $this->faker->numberBetween(1, 5),
            'user_id' => User::factory(),
            'movie_id' => Movie::factory(),
        ];
    }
}
