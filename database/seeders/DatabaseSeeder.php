<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use function Laravel\Prompts\title;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       \App\Models\User::create([
        'name' => 'Admin Amikom',
        'email' => 'admin@amikom.ac.id',
        'password' => bcrypt('password'),
        'role' => 'admin',
       ]);

       $category = \App\Models\Category::create([
        'name' => 'Seminar IT',
        'slug' => 'seminar-it',
       ]);

       $category = \App\Models\Category::firstOrCreate([
        'name' => 'Entertaiment',
        'slug' => 'entertaiment'
       ]);

       \App\Models\Event::create([
        'category_id' => $category->id,
        'title' => 'Jazz Night 2025',
        'description' => 'Nikmati malam yang indah dengan alunan musik',
        'date' => '2026-05-10 19:00:00',
        'location' => 'Amikom Baru',
        'price' => 50000,
        'stock' => 100,
        'poster_path' => 'poster/event-1.png',
       ]);

       \App\Models\Event::create([
        'category_id' => $category->id,
        'title' => 'AI Summit & Expo 2026',
        'description' => 'Jelajahi tren terkini dalam bidang Artifical Intelligence',
        'date' => '2026-05-01 13:00:00',
        'location' => 'Ruang Cinema',
        'price' => 45000,
        'stock' => 150,
        'poster_path' => 'poster/event-2.png',
       ]);

    }
}
