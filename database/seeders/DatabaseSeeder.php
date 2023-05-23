<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Destination;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $u = new User();
        $u->name = 'Administrator';
        $u->email = 'admin@example.com';
        $u->role = 'admin';
        $u->password = bcrypt('admin');
        $u->save();

        $us = new User();
        $us->name = 'User';
        $us->email = 'user@example.com';
        $us->role = 'user';
        $us->password = bcrypt('user');
        $us->save();

        $d = new Destination();
        $d->foto = 'Image/danautoba.jpg';
        $d->nama = 'Danau Toba';
        $d->alamat = 'Sumatera Utara, Indonesia';
        $d->link = 'https://www.google.com/maps/place/Danau+Toba,+Sumatera+Utara/data=!4m2!3m1!1s0x3031de07a843b6ad:0xc018edffa69c0d05?sa=X&ved=2ahUKEwjx4s-TvYr_AhX67TgGHaAzD8EQ8gF6BQiLARAB';
        $d->deskripsi = 'Danau Toba adalah danau alami berukuran besar di Indonesia yang berada di kaldera gunung supervulkan.';
        $d->save();
    }
}
