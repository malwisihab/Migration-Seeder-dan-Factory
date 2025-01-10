<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\Movie;


class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genreIds = DB::table('genres')->pluck('id')->toArray();

        foreach (range(1, 10) as $index) {
            DB::table('movies')->insert([
                'id' => Str::uuid(),
                'title' => 'Movie Title ' . $index,
                'synopsis' => 'This is a sample synopsis for movie ' . $index,
                'poster' => 'default_poster.png', // Default poster
                'year' => rand(2000, 2025), // Random year
                'available' => rand(0, 1), // Random available status
                'genre_id' => $genreIds[array_rand($genreIds)], // Random genre
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
