<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role; // Import model Role
use Illuminate\Support\Str; // Import Str helper

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'id' => Str::uuid(), 
            'name' => 'Admin'
        ]);

        Role::create([
            'id' => Str::uuid(), 
            'name' => 'User'
        ]);
    }
}
