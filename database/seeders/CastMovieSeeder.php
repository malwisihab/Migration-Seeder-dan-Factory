<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cast;
use App\Models\Movie;
use Illuminate\Support\Str; // Import Str helper
use Illuminate\Support\Facades\DB;


class CastMovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cast_movies')->insert([
            'id' => Str::uuid(),
            'movie_id' => Movie::inRandomOrder()->first()->id,
            'cast_id' => Cast::inRandomOrder()->first()->id,
        ]); //
    }
}
