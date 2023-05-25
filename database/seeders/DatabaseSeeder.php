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
        $u->email = 'admin@gmail.com';
        $u->role = 'admin';
        $u->password = bcrypt('admin');
        $u->save();

        $us = new User();
        $us->name = 'User';
        $us->email = 'user@gmail.com';
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

        $d = new Destination();
        $d->foto = 'Image/gunungBromo.jpg';
        $d->nama = 'Gunung Bromo';
        $d->alamat = 'Jawa Timur, Indonesia';
        $d->link = 'https://www.google.com/maps/place/Gn.+Bromo/@-7.9424934,112.9530122,15z/data=!3m1!4b1!4m6!3m5!1s0x2dd637aaab794a41:0xada40d36ecd2a5dd!8m2!3d-7.9424936!4d112.9530122!16zL20vMDI3Z3Jf!5m1!1e4';
        $d->deskripsi = 'Gunung Bromo atau dalam bahasa Tengger dieja "Brama", juga disebut Kaldera Tengger, adalah sebuah gunung berapi aktif di Jawa Timur, Indonesia.';
        $d->save();
    }
}
