<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // USER ADMIN
        User::create([
            'name' => 'Admin Amikom',
            'email' => 'admin@amikom.ac.id',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        // CATEGORIES
        $seminar = \App\Models\Category::firstOrCreate([
            'name' => 'Seminar IT',
            'slug' => 'seminar-it',
        ]);

        $entertainment = \App\Models\Category::firstOrCreate([
            'name' => 'Entertainment',
            'slug' => 'entertainment',
        ]);

        $sport = \App\Models\Category::firstOrCreate([
            'name' => 'Olahraga',
            'slug' => 'olahraga',
        ]);

    
        \App\Models\Event::create([
            'category_id' => $seminar->id,
            'title' => 'UI/UX Masterclass',
            'description' => 'Belajar desain UI/UX dari basic sampai advance',
            'date' => '2026-05-10 09:00:00',
            'location' => 'Lab Komputer 1',
            'price' => 75000,
            'stock' => 50,
            'poster_path' => 'poster/event-1.png',
        ]);

        \App\Models\Event::create([
            'category_id' => $seminar->id,
            'title' => 'AI Summit & Expo 2026',
            'description' => 'Jelajahi tren terbaru Artificial Intelligence',
            'date' => '2026-05-15 13:00:00',
            'location' => 'Ruang Cinema',
            'price' => 45000,
            'stock' => 150,
            'poster_path' => 'poster/event-2.png',
        ]);

        \App\Models\Event::create([
            'category_id' => $entertainment->id,
            'title' => 'Jazz Night 2026',
            'description' => 'Nikmati malam dengan alunan musik jazz',
            'date' => '2026-06-01 19:00:00',
            'location' => 'Amikom Baru',
            'price' => 50000,
            'stock' => 100,
            'poster_path' => 'poster/event-3.png',
        ]);

        \App\Models\Event::create([
            'category_id' => $entertainment->id,
            'title' => 'Film Festival Kampus',
            'description' => 'Pemutaran film karya mahasiswa',
            'date' => '2026-06-10 18:00:00',
            'location' => 'Auditorium',
            'price' => 30000,
            'stock' => 120,
            'poster_path' => 'poster/event-4.png',
        ]);

        \App\Models\Event::create([
            'category_id' => $sport->id,
            'title' => 'E-Sport U-Champ',
            'description' => 'Turnamen Mobile Legends antar mahasiswa',
            'date' => '2026-07-01 10:00:00',
            'location' => 'Lab Game',
            'price' => 25000,
            'stock' => 200,
            'poster_path' => 'poster/event-5.png',
        ]);

        \App\Models\Event::create([
            'category_id' => $sport->id,
            'title' => 'Futsal Competition',
            'description' => 'Kompetisi futsal antar jurusan',
            'date' => '2026-07-10 08:00:00',
            'location' => 'Lapangan Futsal',
            'price' => 20000,
            'stock' => 150,
            'poster_path' => 'poster/event-6.png',
        ]);
    }
}